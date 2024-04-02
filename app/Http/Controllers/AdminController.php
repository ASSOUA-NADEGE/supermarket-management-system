<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return inertia('admin/Dashboard');
    }

    public function indexUsers(){
        return inertia('admin/users/Index',['users'=> User::all()->except(Auth::id())]);
    }
    public function createUsers(){
        return inertia('admin/users/Create');
    }

    public function indexProducts(){
        return inertia('admin/products/Index',["products" => Product::all()]);
    }

    public function createProducts(){
        return inertia('admin/products/Create',['categories'=>Category::all()]);
    }

    public function indexOrders(){
        return inertia('admin/orders/Index');
    }

    public function indexCategories(){
        return inertia('admin/categories/Index');
    }
}
