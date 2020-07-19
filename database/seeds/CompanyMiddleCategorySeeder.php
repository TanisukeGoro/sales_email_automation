<?php

use App\Models\CompanyLargeCategory;
use App\Models\CompanyMiddleCategory;
use Illuminate\Database\Seeder;

class CompanyMiddleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
            ]
        );
        $responseBody = $response->getBody()->getContents();
        $responseBody = \json_decode($responseBody, true);

        $categories = $responseBody['result'];
        $query = [];
        $large_categories = CompanyLargeCategory::all()->keyBy('code');

        foreach ($categories as $key => $category) {
            $query[] = [
                'name' => $category['simcName'],
                'code' => $category['simcCode'],
                'company_large_category_id' => $large_categories[$category['sicCode']]->id,
            ];
        }
        CompanyMiddleCategory::insert($query);
    }
}
