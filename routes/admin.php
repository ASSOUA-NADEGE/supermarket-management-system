<?php


use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::get('/', function(){
       return inertia('admin/Dashboard');
    });
});
