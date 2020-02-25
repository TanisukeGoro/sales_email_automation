<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CompaniesTest extends TestCase
{
    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;
    /**
     * 各テストメソッドの実行前に呼ばれる
     */
    public function setUp(): void
    {
        parent::setUp();
        // テストケース実行前にフォルダデータを作成する
        $this->seed('UsersTableSeeder');
        $this->seed('CompaniesSeeder');
    }
    /**
     * Show Companies Index Page.
     *
     * @test
     */
    public function show_companies_index_page()
    {
        $response = $this->actingAs(User::first())->get('/companies');
        // $response = $this->get('/company');

        $response->assertStatus(200);
    }
}
