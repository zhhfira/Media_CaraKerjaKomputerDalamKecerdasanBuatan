<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    public function run(): void
    {
        Badge::insert([
            [
                'name'       => 'Master Data',
                'image'      => 'badge_data.png',
                'quiz_id'    => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Ahli Algoritma',
                'image'      => 'badge_algo.png',
                'quiz_id'    => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Pakar Machine Learning',
                'image'      => 'badge_ml.png',
                'quiz_id'    => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Computational Thinker',
                'image'      => 'badge_ct.png',
                'quiz_id'    => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}