<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'book_id' => 1,
            'user_id' => 1,
            'review' => 'Ya seperti itulah bukunya',
            'time' => now()
        ]);
    }
}
