<?php


use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::redirect('/', 'admin/dashboard');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('users', [AdminController::class, 'indexUsers'])->name('admin.users');
    Route::get('users/create', [AdminController::class, 'createUsers'])->name('admin.users.create');
    Route::get('products', [AdminController::class, 'indexProducts'])->name('admin.products');
    Route::get('products/create', [AdminController::class, 'createProducts'])->name('admin.products.create');
    Route::get('orders', [AdminController::class, 'indexOrders'])->name('admin.orders');
    Route::get('categories', [AdminController::class, 'indexCategories'])->name('admin.categories');
});
