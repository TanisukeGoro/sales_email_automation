<?php

use App\Models\CompanyCategory;
use App\Models\ListingStock;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create('ja_JP');

        $file = new SplFileObject('database/csv_db/companies.csv');

        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE);

        $list = [];
        $date = new DateTimeImmutable();
        $now = $date->format('Y-m-d');

        foreach ($file as $line) {
            $list[] = [
                'name' => $line[0],
                'code' => $line[1],
                'listing_stock_id' => \mt_rand(1, ListingStock::all()->count() !== 0 ? ListingStock::all()->count() : 2),
                'company_category_id' => \mt_rand(1, CompanyCategory::all()->count() !== 0 ? CompanyCategory::all()->count() : 2),
                'address' => $faker->address,
                'n_employees' => \mt_rand(100, 30000),
                'top_url' => $line[2],
                'form_url' => $line[3],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        // データが巨大な場合は配列を分割して挿入していく
        $chunk_size = 1000;
        $chunk_data = \array_chunk($list, $chunk_size);

        foreach ($chunk_data as $data) {
            DB::table('companies')->insert($data);
        }
        //ここまで
    }
}
