<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Ubur-Ubur Lembur',
            'publisher' => 'Gagas Media',
            'author' => 'Raditya Dika',
            'release' => '2018',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi, maxime eligendi dignissimos esse quia vero perferendis. Ipsum cumque nemo, mollitia est deleniti voluptatibus. Necessitatibus adipisci officia distinctio iure? Maiores, temporibus!'
        ]);

        Book::create([
            'title' => 'Title Book',
            'publisher' => 'Publisher 001',
            'author' => 'Author',
            'release' => '2023',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus reiciendis harum ipsum numquam dolorem alias.'
        ]);
    }
}
