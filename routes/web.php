<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect(request()->user()?->hasRole('admin') ? 'admin' : 'vendor');
})->name('landing');
Route::resource('products', ProductController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('vendor')
    ->name('vendor.')
    ->middleware(['auth', 'role:vendor'])
    ->group(function ($router) {
        $router->redirect('', '/vendor/dashboard');
        Route::get('/dashboard', [VendorController::class, 'dashboard']);
        Route::get('/products', [VendorController::class, 'indexProduct']);
        Route::get('/profile', [VendorController::class, 'profile']);
        Route::get('/orders', [VendorController::class, 'indexOrder']);
        Route::get('/orders/create', [VendorController::class, 'createOrder']);

        $router->resource('orders', \App\Http\Controllers\OrderController::class)->only('show', 'store', 'update', 'destroy');
    });

require base_path('routes/admin.php');

// Route::prefix('breeze')->group(function () {
//     Route::get('/', function () {
//         return Inertia::render('Welcome', [
//             'canLogin' => Route::has('login'),
//             'canRegister' => Route::has('register'),
//             'laravelVersion' => Application::VERSION,
//             'phpVersion' => PHP_VERSION,
//         ]);
//     });
//
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->middleware(['auth', 'verified'])->name('dashboard');
//

//     require __DIR__ . '/auth.php';
// });

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::controller(App\Http\Controllers\AuthenticationController::class)->group(function () {
        Route::post('', 'login');
        Route::get('/', 'home');
        Route::get('/{role}', 'role');
    });
});

Route::middleware('auth')->group(function () {
    Route::match(['GET', 'POST'], '/logout', function () {
        auth()->logout();

//        session()->invalidate();

        return redirect('auth')->with('toast', ['severity'=>'success','summary'=>'Successfully logout','detail'=>'successfully']);
    });
});

Route::inertia('rxjs', 'rxjs');
