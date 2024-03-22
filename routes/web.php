<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'landing'])->name('landing');
//Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::resource('products', ProductController::class);

Route::prefix('breeze')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    require __DIR__ . '/auth.php';
});

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::controller(App\Http\Controllers\AuthenticationController::class)->group(function () {
        Route::post('', 'login');
        Route::get('/', 'home')->name('login');
        Route::get('/{role}', 'role');
    });
});

Route::inertia('rxjs', 'rxjs');
