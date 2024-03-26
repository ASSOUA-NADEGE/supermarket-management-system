<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', fn () => Product::query()->whereAny(['name', 'description', 'sku'], 'LIKE', '%' . request('q') . '%')->get());
