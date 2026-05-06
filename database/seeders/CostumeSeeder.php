<?php

namespace Database\Seeders;

use App\Models\Costume;
use Illuminate\Database\Seeder;

class CostumeSeeder extends Seeder
{
    public function run()
    {
        $costumes = [
            [
                'name' => 'Hatsune Miku',
                'character' => 'Hatsune Miku',
                'size' => 'M',
                'stock' => 5,
                'price' => 450000,
                'description' => 'Costume lengkap dengan wig dan aksesoris.',
                'category_id' => 1,
                'image' => 'costumes/miku.jpg',
            ],
            [
                'name' => 'Goku Ultra Instinct',
                'character' => 'Son Goku',
                'size' => 'L',
                'stock' => 3,
                'price' => 650000,
                'description' => 'Costume Goku versi Ultra Instinct.',
                'category_id' => 2,
                'image' => 'costumes/goku.jpg',
            ],
            [
                'name' => 'Spider-Man Miles Morales',
                'character' => 'Miles Morales',
                'size' => 'M',
                'stock' => 8,
                'price' => 380000,
                'description' => 'Costume Spider-Man dengan desain modern.',
                'category_id' => 5,
                'image' => 'costumes/spiderman.jpg',
            ],
            [
                'name' => '2B NieR Automata',
                'character' => '2B',
                'size' => 'S',
                'stock' => 4,
                'price' => 750000,
                'description' => 'Costume premium dengan detail tinggi.',
                'category_id' => 1,
                'image' => 'costumes/2b.jpg',
            ],
        ];

        foreach ($costumes as $costume) {
            Costume::create($costume);
        }
    }
}