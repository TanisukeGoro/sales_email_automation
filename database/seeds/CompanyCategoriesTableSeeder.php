<?php

use Illuminate\Database\Seeder;

class CompanyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // 参考URL https://opendata.resas-portal.go.jp/docs/api/v1/index.html

    public function run(): void
    {
        $base_url = 'https://opendata.resas-portal.go.jp';
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
        ]);
        $path = '/api/v1/industries/middle';
        $headers = [
            'X-API-KEY' => 'OdHUhEf0rtB9PB1ImWijnIk1AWW713H0LZx8KUQ6',
        ];
        $response = $client->request(
        'GET',
        $path,
        [
            'http_errors' => false,
            'headers' => $headers,
            //'form_params'     => $form_params,
        ]
    );
        $responseBody = $response->getBody()->getContents();
        $responseBody = \json_decode($responseBody, true);

        $categories = $responseBody['result'];

        foreach ($categories as $key => $category) {
            DB::table('company_categories')->insert([
                'name' => $category['simcName'],
                'code' => $category['simcCode'],
            ]);
        }
    }
}
