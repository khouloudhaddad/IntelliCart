<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::where('slug', 'iphone-16')->first();

        if(!$product) return;

        ProductVariant::create([
            'product_id' => $product->id,
            'size' => '128GB',
            'sku' => 'IPHONE16-128',
            'price' => 75000,
            'stock' => 20,
            'position' => 1
         ]);

         ProductVariant::create([
            'product_id' => $product->id,
            'size' => '256GB',
            'sku' => 'IPHONE16-256',
            'price' => 85000,
            'stock' => 15,
            'position' => 2
         ]);
    }
}
