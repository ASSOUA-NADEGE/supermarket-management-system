<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    public function dashboard()
    {
        return inertia('vendor/Dashboard', [
            'orders' => Order::query()->where('vendor_id', auth()->user()->id)->get(),
        ]);
    }

    public function createOrder()
    {
        abort_unless(request()->user()->can('create', Order::class), Response::HTTP_FORBIDDEN);

        return inertia('vendor/order/Create', ['products' => Product::all(), 'categories' => Category::all()]);
    }

    public function indexOrder()
    {
        return inertia('vendor/order/Index', [
            'orders' => fn () => Order::with('vendor')->where('vendor_id', auth()->user()->id)->get()
        ]);
    }

    public function indexProduct()
    {
        abort_unless(request()->user()->can('viewAny', Product::class), Response::HTTP_FORBIDDEN);

        return inertia('vendor/product/Index');
    }

    public function profile()
    {
        return inertia('vendor/profile/Edit');
    }
}
