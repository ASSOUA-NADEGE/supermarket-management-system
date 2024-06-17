<?php

namespace App\Http\Controllers;

use App\Actions\Order\GetYearlySales;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Pipeline;

class AdminController extends Controller
{
    public function dashboard(){
        $chart = Pipeline::send(Order::query())
            ->through([GetYearlySales::class])
            ->thenReturn(fn (Builder $orders) => $orders);

        dump($chart);

        return inertia('admin/Dashboard', compact('chart'));
    }

    public function indexUsers(){
        return inertia('admin/users/Index',['users'=> User::all()->except(Auth::id())]);
    }
    public function createUsers(){
        return inertia('admin/users/Create');
    }

    public function editUsers(User $user){
        return inertia('admin/users/Show',["user" => $user]);
    }

    public function indexProducts(){
        return inertia('admin/products/Index',["products" => Product::all()]);
    }

    public function createProducts(){
        return inertia('admin/products/Create',['categories'=>Category::all()]);
    }

    public function indexOrders(){
        return inertia('admin/orders/Index', ['orders' => Order::query()->latest()->paginate()]);
    }

    public function indexCategories(){
        return inertia('admin/categories/Index')->with('categories', Category::query()->orderBy('name')->get());
    }

    public function createCategories(){
        return inertia('admin/categories/Create');
    }

    public function storeCategories(Request $request){
        $attributes = $request->validate(["name"=> 'required','description' => 'required']);
        Category::create($attributes);
        return to_route('admin.categories')->with(['toast'=>'category created successfully']);
    }

    public function deleteCategories(Category $category){
        $category->delete();
        return to_route('admin.categories')->with(['toast' => 'category deleted successfully']);
    }
}
