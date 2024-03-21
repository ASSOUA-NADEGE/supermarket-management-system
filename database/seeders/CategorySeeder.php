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
        $icons = [
            "electronics" => "pi pi-fw pi-desktop",
            "jewelery" => "pi pi-fw pi-heart",
            "men's clothing" => "pi pi-fw pi-tshirt",
            "women's clothing" => "pi pi-fw fi-tshirt",
        ];
        $api_categories = collect(Http::get('https://fakestoreapi.com/products/categories')->json());
        $api_categories->each(function ($category) use ($icons) {
            Category::create(["icon" => $icons[$category], "name" => $category, "description" => "$category description"]);
        });
    }
}
