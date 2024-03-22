<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $products = collect(Http::get('https://fakestoreapi.com/products')->json());
        $products->each(function ($product) use ($categories) {
            Product::factory()->create([
                "category_id" => $categories->random()->id,
                "name" => $product["title"],
                "price" => $product["price"],
                "description" => $product["description"],
                "image" => $product["image"],
            ]);
        });
    }
}
