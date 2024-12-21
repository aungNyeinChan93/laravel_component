<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $users = User::latest()->simplePaginate(5);
    return view('welcome', compact('users'));
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get("/categories", [CategoryController::class, 'index'])->name('categories.index');
    Route::get("users", [UserController::class, 'index'])->name('user.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});
