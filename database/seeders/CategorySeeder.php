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
                'image' => 'https://images.tokopedia.net/img/cache/900/hDjmkQ/2023/5/16/6ea7003d-eb4b-4ebf-9001-4f27ef8b4ca0.jpg',
            ],
            [
                'name' => 'Bawahan',
                'slug' => 'bawahan',
                'image' => 'https://images.tokopedia.net/img/cache/900/hDjmkQ/2023/5/16/6ea7003d-eb4b-4ebf-9001-4f27ef8b4ca0.jpg',
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
