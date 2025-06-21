<?php

use App\Http\Controllers\Site\CabinetController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/',[SiteController::class,'index']);
Route::get('/category',[SiteController::class,'category']);
Route::get('/equipment/{id}',[SiteController::class,'equipment']);
Route::get("/search",[SiteController::class,'search']);
Route::get("/register",[SiteController::class,'register'])->middleware('guest');
Route::post("/register",[SiteController::class,'registerUser'])->middleware('guest');
Route::get("/login", [SiteController::class,'login'])->middleware('guest')->name('login');
Route::post("/login", [SiteController::class,'loginUser'])->middleware('guest');
Route::middleware('auth')->group(function () {
    Route::get("/carts",[CartController::class, 'index']);
    Route::get("/add-cart", [CartController::class,'add']);
    Route::get("/delete-cart", [CartController::class, 'delete']);
    Route::get("/edit-cart", [CartController::class, 'edit']);
    Route::get("/buy-carts", [CartController::class, 'buyCarts']);
    Route::get("/cabinet", [CabinetController::class, 'index']);
    Route::post("/edit-user", [CabinetController::class, 'editUser']);
    Route::post("/edit-user-password", [CabinetController::class, 'editPassword']);
    Route::get('/logout', [SiteController::class, 'logOut']);
    Route::get('/orders', [CabinetController::class, 'orders']);
});
