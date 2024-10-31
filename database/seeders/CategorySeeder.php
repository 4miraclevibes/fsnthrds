<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Atasan',
                'slug' => 'atasan',
                'image' => 'https://ik.imagekit.io/dcjlghyytp1/atasan.jpg',
            ],
            [
                'name' => 'Bawahan',
                'slug' => 'bawahan',
                'image' => 'https://ik.imagekit.io/dcjlghyytp1/bawahan.jpg',
            ],
            [
                'name' => 'Outerwear',
                'slug' => 'outerwear',
                'image' => 'https://ik.imagekit.io/dcjlghyytp1/outerwear.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
