<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $api_categories = collect(Http::get('https://fakestoreapi.com/products/categories')->json());
        $api_categories->each(function ($category) {
            Category::create(["name" => $category, "description" => "$category description"]);
        });
    }
}
