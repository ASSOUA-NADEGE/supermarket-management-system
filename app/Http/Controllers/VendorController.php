<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function dashboard(){
        return inertia('vendor/Dashboard');
    }

    public function createOrder(){
        return inertia('vendor/order/Create',['products'=>Product::all(),'categories'=>Category::all()]);
    }

    public function indexOrder(){
        return inertia('vendor/order/Index');
    }

    public function indexProduct(){
        return inertia('vendor/product/Index');
    }

    public function profile(){
        return inertia('vendor/profile/Edit');
    }
}
