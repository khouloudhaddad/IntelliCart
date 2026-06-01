<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::where('slug', 'electronics')->first();

        if (! $category) {
            return;
        }

        $products = [
            [
                'category_id' => $category->id,
                'name' => 'iPhone 16',
                'slug' => 'iphone-16',
                'description' => 'Latest Apple iPhone with advanced features',
                'price' => 80000,
                'sale_price' => 75000,
                'sku' => 'IPHONE16-BLK-128',
                'stock' => 50,
                'featured' => 1,
                'meta_title' => 'Buy iPhone 16 Online',
                'meta_description' => 'Best price for iPhone 16',
                'meta_keywords' => 'iphone, apple, mobile',
            ],
            [
                'category_id' => $category->id,
                'name' => 'Samsung Galaxy S24',
                'slug' => 'samsung-galaxy-s24',
                'description' => 'Flagship Samsung smartphone with AMOLED display',
                'price' => 65000,
                'sale_price' => 62000,
                'sku' => 'SGS24-256',
                'stock' => 40,
                'featured' => 1,
                'meta_title' => 'Samsung Galaxy S24',
                'meta_description' => 'Best Samsung flagship phone',
                'meta_keywords' => 'samsung, galaxy, android',
            ],
            [
                'category_id' => $category->id,
                'name' => 'Xiaomi Redmi Note 13',
                'slug' => 'xiaomi-redmi-note-13',
                'description' => 'Affordable smartphone with strong performance',
                'price' => 18000,
                'sale_price' => 17000,
                'sku' => 'RN13-128',
                'stock' => 120,
                'featured' => 0,
                'meta_title' => 'Redmi Note 13',
                'meta_description' => 'Budget Android phone',
                'meta_keywords' => 'xiaomi, redmi, android',
            ],
            [
                'category_id' => $category->id,
                'name' => 'OnePlus 12',
                'slug' => 'oneplus-12',
                'description' => 'Fast performance smartphone with OxygenOS',
                'price' => 55000,
                'sale_price' => 52000,
                'sku' => 'OP12-256',
                'stock' => 60,
                'featured' => 1,
                'meta_title' => 'OnePlus 12',
                'meta_description' => 'Speed and performance phone',
                'meta_keywords' => 'oneplus, android, fast',
            ],
            [
                'category_id' => $category->id,
                'name' => 'Google Pixel 8',
                'slug' => 'google-pixel-8',
                'description' => 'Pure Android experience with AI camera',
                'price' => 60000,
                'sale_price' => 58000,
                'sku' => 'PIX8-128',
                'stock' => 35,
                'featured' => 1,
                'meta_title' => 'Google Pixel 8',
                'meta_description' => 'Best AI camera phone',
                'meta_keywords' => 'google, pixel, android',
            ],
        ];

        // Generate 15 more dynamic products
        for ($i = 6; $i <= 20; $i++) {
            $products[] = [
                'category_id' => $category->id,
                'name' => "Android Phone Model $i",
                'slug' => "android-phone-model-$i",
                'description' => "High quality Android smartphone model $i",
                'price' => rand(15000, 70000),
                'sale_price' => rand(14000, 65000),
                'sku' => "APM-$i-" . rand(100, 999),
                'stock' => rand(10, 100),
                'featured' => rand(0, 1),
                'meta_title' => "Android Phone $i",
                'meta_description' => "Best Android phone model $i",
                'meta_keywords' => 'android, smartphone',
            ];
        }

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
