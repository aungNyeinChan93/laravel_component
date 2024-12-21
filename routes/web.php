<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $users = User::latest()->simplePaginate(5);
    return view('welcome', compact('users'));
})->name('home');


Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get("/categories", [CategoryController::class, 'index'])->name('categories.index');
    Route::get("users", [UserController::class, 'index'])->name('user.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // products
    Route::group(["prefix"=>"products"],function(){
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('create', [ProductController::class, 'create'])->name('products.create');
        Route::post('create', [ProductController::class, 'store'])->name('products.store');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('update/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::get('{product}', [ProductController::class, 'show'])->name('products.show');
        Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

});
