<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return inertia('admin/Dashboard');
    }

    public function indexUsers(){
        return inertia('admin/users/Index');
    }

    public function indexProducts(){
        return inertia('admin/products/Index');
    }

    public function indexOrders(){
        return inertia('admin/orders/Index');
    }

    public function indexCategories(){
        return inertia('admin/categories/Index');
    }
}
