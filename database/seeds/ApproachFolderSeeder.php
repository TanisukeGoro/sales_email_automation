<?php

use Illuminate\Database\Seeder;

class ApproachFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(\App\Models\ApproachFolder::class, 4)->create();
    }
}
