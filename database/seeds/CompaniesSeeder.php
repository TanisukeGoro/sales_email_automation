<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new SplFileObject('database/csv_db/companies.csv');

        $file->setFlags(
            \SplFileObject::READ_CSV |
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |
                \SplFileObject::DROP_NEW_LINE
        );

        $list = [];
        $date = new DateTime();
        $now = $date->format('Y-m-d');

        foreach ($file as $line) {
            $list[] = [
                "name" => $line[0],
                "code" => $line[1],
                "top_url" => $line[2],
                "form_url" => $line[3],
                "created_at" => $now,
                "updated_at" => $now
            ];
        }
        // データが巨大な場合は配列を分割して挿入していく
        $chunk_size = 1000;
        $chunk_data = array_chunk($list, $chunk_size);

        foreach ($chunk_data as $data) {
            DB::table("companies")->insert($data);
        }
        //ここまで
    }
}
