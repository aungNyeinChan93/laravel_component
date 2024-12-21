<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $users = User::latest()->simplePaginate(5);
    return view('welcome',compact('users'));
})->name('home');

Route::get("/categories",[CategoryController::class,'index'])->name('categories.index');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');

Route::get("user",[UserController::class,'index'])->name('user.index');
