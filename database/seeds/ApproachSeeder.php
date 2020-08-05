<?php

use Illuminate\Database\Seeder;

class ApproachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(\App\Models\Approach::class, 100)->create();
    }
}
