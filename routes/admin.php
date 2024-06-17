<?php


use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::redirect('/', 'admin/dashboard');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('users', [AdminController::class, 'indexUsers'])->name('admin.users');
    Route::get('users/create', [AdminController::class, 'createUsers'])->name('admin.users.create');
    Route::get('users/edit/{user}', [AdminController::class, 'editUsers'])->name('admin.users.edit');
    Route::get('products', [AdminController::class, 'indexProducts'])->name('admin.products');
    Route::get('products/create', [AdminController::class, 'createProducts'])->name('admin.products.create');
    Route::get('orders', [AdminController::class, 'indexOrders'])->name('admin.orders');
    Route::get('categories', [AdminController::class, 'indexCategories'])->name('admin.categories');
    Route::get('categories/create',[AdminController::class,'createCategories'])->name('admin.categories.create');
    Route::post('/categories/create',[AdminController::class,'storeCategories'])->name('admin.categories.store');
    Route::delete('/categories/{category}',[AdminController::class,'deleteCategories'])->name('admin.categories.delete');
});
