<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function landing()
    {
        return inertia('Welcome',[
            "categories" => Category::all(),
            "popular_products" => Product::all()->take(9),
            "deals" => Product::all()->random(3)
        ]);
    }
}
