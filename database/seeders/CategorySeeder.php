<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_name' => 'Anime'],
            ['category_name' => 'Game'],
            ['category_name' => 'Movie'],
            ['category_name' => 'Original Character'],
            ['category_name' => 'Superhero'],
            ['category_name' => 'Fantasy'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
