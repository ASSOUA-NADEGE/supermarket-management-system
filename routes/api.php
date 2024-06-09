<?php

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', fn () =>
    Pipeline::send(Product::query()->limit(10))->through([
        // Fetch products matching the searched query
        function (Builder $query, Closure $next) {
            if (!empty(request('q')))
                $query->whereAny(['name', 'description', 'sku'], 'LIKE', '%' . request('q') . '%');

            return $next($query);
        },

        // Fetch products matching the category name
        function (Builder $query, Closure $next) {
            if (!empty(request('category')))
                $query->whereRelation('category', 'name', request('category'));

            return $next($query);
        }
    ])->then(fn (Builder $query) => $query->get())
);
