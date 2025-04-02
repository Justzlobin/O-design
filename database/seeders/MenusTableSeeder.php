<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'position' => 4,
                'title' => 'plans',
                'link' => '/plans',
                'background_type' => 'gradient',
                'is_active' => 1,
                'created_at' => '2025-02-27 16:56:56',
                'updated_at' => '2025-02-27 16:56:56',
            ],
            [
                'position' => 2,
                'title' => 'about us',
                'link' => '/about-us',
                'background_type' => 'gradient',
                'is_active' => 1,
                'created_at' => '2025-02-27 16:56:56',
                'updated_at' => '2025-02-27 16:56:56',
            ],
            [
                'position' => 1,
                'title' => 'projects',
                'link' => '/projects',
                'background_type' => 'gradient',
                'is_active' => 1,
                'created_at' => '2025-02-27 16:56:56',
                'updated_at' => '2025-02-27 16:56:56',
            ],
            [
                'position' => 3,
                'title' => 'question/answers',
                'link' => '/faq',
                'background_type' => 'gradient',
                'is_active' => 1,
                'created_at' => '2025-02-27 16:56:56',
                'updated_at' => '2025-02-27 16:56:56',
            ],
        ]);
    }
}
