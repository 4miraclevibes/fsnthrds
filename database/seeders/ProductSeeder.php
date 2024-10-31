<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use App\Models\VariantStock;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Kaos Polos',
                'slug' => 'kaos-polos',
                'thumbnail' => 'https://ik.imagekit.io/dcjlghyytp1/kaos-polos.jpg',
                'description' => 'Kaos polos dengan bahan katun combed 30s',
            ],
            [
                'category_id' => 1,
                'name' => 'Kemeja Flanel',
                'slug' => 'kemeja-flanel',
                'thumbnail' => 'https://ik.imagekit.io/dcjlghyytp1/kemeja-flanel.jpg',
                'description' => 'Kemeja flanel dengan motif kotak-kotak',
            ],
            [
                'category_id' => 2,
                'name' => 'Celana Jeans',
                'slug' => 'celana-jeans',
                'thumbnail' => 'https://ik.imagekit.io/dcjlghyytp1/celana-jeans.jpg',
                'description' => 'Celana jeans dengan bahan denim premium',
            ],
            [
                'category_id' => 2,
                'name' => 'Celana Chino',
                'slug' => 'celana-chino',
                'thumbnail' => 'https://ik.imagekit.io/dcjlghyytp1/celana-chino.jpg',
                'description' => 'Celana chino dengan bahan katun stretch',
            ],
            [
                'category_id' => 3,
                'name' => 'Jaket Bomber',
                'slug' => 'jaket-bomber',
                'thumbnail' => 'https://ik.imagekit.io/dcjlghyytp1/jaket-bomber.jpg',
                'description' => 'Jaket bomber dengan bahan polyester',
            ],
            [
                'category_id' => 3,
                'name' => 'Hoodie',
                'slug' => 'hoodie',
                'thumbnail' => 'https://ik.imagekit.io/dcjlghyytp1/hoodie.jpg',
                'description' => 'Hoodie dengan bahan fleece',
            ],
        ];

        foreach ($products as $product) {
            $createdProduct = Product::create($product);

            $this->createProductVariants($createdProduct->id);
            $this->createProductImages($createdProduct->id);
        }
    }

    private function createProductVariants($productId)
    {
        $variants = [
            [
                ['name' => 'S', 'price' => 50000, 'is_visible' => 1],
                ['name' => 'M', 'price' => 50000, 'is_visible' => 1],
                ['name' => 'L', 'price' => 55000, 'is_visible' => 1],
                ['name' => 'XL', 'price' => 55000, 'is_visible' => 1],
            ],
            [
                ['name' => 'S', 'price' => 150000, 'is_visible' => 1],
                ['name' => 'M', 'price' => 150000, 'is_visible' => 1],
                ['name' => 'L', 'price' => 160000, 'is_visible' => 1],
                ['name' => 'XL', 'price' => 160000, 'is_visible' => 1],
            ],
            [
                ['name' => '28', 'price' => 250000, 'is_visible' => 1],
                ['name' => '30', 'price' => 250000, 'is_visible' => 1],
                ['name' => '32', 'price' => 260000, 'is_visible' => 1],
                ['name' => '34', 'price' => 260000, 'is_visible' => 1],
            ],
            [
                ['name' => '28', 'price' => 200000, 'is_visible' => 1],
                ['name' => '30', 'price' => 200000, 'is_visible' => 1],
                ['name' => '32', 'price' => 210000, 'is_visible' => 1],
                ['name' => '34', 'price' => 210000, 'is_visible' => 1],
            ],
            [
                ['name' => 'S', 'price' => 300000, 'is_visible' => 1],
                ['name' => 'M', 'price' => 300000, 'is_visible' => 1],
                ['name' => 'L', 'price' => 320000, 'is_visible' => 1],
                ['name' => 'XL', 'price' => 320000, 'is_visible' => 1],
            ],
            [
                ['name' => 'S', 'price' => 250000, 'is_visible' => 1],
                ['name' => 'M', 'price' => 250000, 'is_visible' => 1],
                ['name' => 'L', 'price' => 270000, 'is_visible' => 1],
                ['name' => 'XL', 'price' => 270000, 'is_visible' => 1],
            ],
        ][$productId - 1];

        foreach ($variants as $variant) {
            $createdVariant = ProductVariant::create(array_merge(['product_id' => $productId], $variant));
            $variantStock = VariantStock::create([
                'product_variant_id' => $createdVariant->id,
                'quantity' => mt_rand(5, 20),
            ]);
            for ($i = 0; $i < $variantStock->quantity; $i++) {
                $variantStock->stockDetails()->create([
                    'variant_stock_id' => $variantStock->id,
                    'capital_price' => $variant['price'] - ($variant['price'] * 0.3),
                    'selling_price' => null,
                    'status' => 'ready',
                ]);
            }
        }
    }

    private function createProductImages($productId)
    {
        $images = [
            [
                'https://ik.imagekit.io/dcjlghyytp1/kaos-polos-1.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/kaos-polos-2.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/kaos-polos-3.jpg',
            ],
            [
                'https://ik.imagekit.io/dcjlghyytp1/kemeja-flanel-1.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/kemeja-flanel-2.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/kemeja-flanel-3.jpg',
            ],
            [
                'https://ik.imagekit.io/dcjlghyytp1/celana-jeans-1.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/celana-jeans-2.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/celana-jeans-3.jpg',
            ],
            [
                'https://ik.imagekit.io/dcjlghyytp1/celana-chino-1.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/celana-chino-2.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/celana-chino-3.jpg',
            ],
            [
                'https://ik.imagekit.io/dcjlghyytp1/jaket-bomber-1.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/jaket-bomber-2.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/jaket-bomber-3.jpg',
            ],
            [
                'https://ik.imagekit.io/dcjlghyytp1/hoodie-1.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/hoodie-2.jpg',
                'https://ik.imagekit.io/dcjlghyytp1/hoodie-3.jpg',
            ],
        ][$productId - 1];

        foreach ($images as $image) {
            ProductImage::create([
                'product_id' => $productId,
                'image' => $image,
            ]);
        }
    }
}