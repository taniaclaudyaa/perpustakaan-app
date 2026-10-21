<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 8 Kategori terlebih dahulu
        $categories = Category::factory()->count(8)->create();

        // 2. Buat 5 Penulis
        Author::factory()
            ->count(5)
            ->create()
            ->each(function ($author) use ($categories) {
                // Setiap penulis memiliki 10 buku dengan kategori acak
                Book::factory()->count(10)->create([
                    'author_id' => $author->id,
                    'category_id' => $categories->random()->id,
                ]);
            });
    }
}