<?php


use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::redirect('/','/dashboard');
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('users',[AdminController::class,'indexUsers'])->name('admin.users');
    Route::get('products',[AdminController::class,'indexProducts'])->name('admin.products');
    Route::get('orders',[AdminController::class,'indexOrders'])->name('admin.orders');
    Route::get('categories',[AdminController::class,'indexCategories'])->name('admin.categories');
});
