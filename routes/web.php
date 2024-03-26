<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DetailSaleController;
use App\Http\Middleware\isLogin;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/transaksi', function () {
    return view('pages.transaksi');
})->name('transaksi');

// Route::get('/sign-up', function () {
//     return view('auth.signup');
// })->name('signUp');

// Route::get('/sign-in', function () {
//     return view('auth.signin');
// })->name('signIn');
Route::middleware('isGuest')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'signIn'])->name('signIn');
    Route::post('/sign-in', [AuthController::class, 'auth'])->name('auth');
    Route::get('/sign-up', [AuthController::class, 'signUp'])->name('signUp');
    Route::post('/sign-up', [AuthController::class, 'register'])->name('register');

});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('isLogin')->prefix('/user')->name('user.')->group(function () {
    Route::get('/', [AuthController::class, 'user'])->name('index');
    Route::post('/create-user', [AuthController::class, 'createUser'])->name('store');
});
// Buyer
Route::middleware('isLogin')->prefix('/buyer')->name('buyer.')->group(function () {
    Route::get('/', [BuyerController::class, 'index'])->name('index');
    Route::get('/create-buyer', [BuyerController::class, 'create'])->name('create');
    Route::post('/create-buyer', [BuyerController::class, 'store'])->name('store');
    Route::get('/edit{id}', [BuyerController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [BuyerController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BuyerController::class, 'destroy'])->name('destroy');

});

// Product
Route::middleware('isLogin')->prefix('/product')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create-product', [ProductController::class, 'create'])->name('create');
    Route::post('/create-product', [ProductController::class, 'store'])->name('store');
    Route::get('/edit{id}', [ProductController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

});

// Sale
Route::middleware('isLogin')->prefix('/sale')->name('sale.')->group(function () {
    Route::get('/', [SaleController::class, 'index'])->name('index');
    Route::get('/create-sale', [SaleController::class, 'create'])->name('create');
    Route::post('/create-sale', [SaleController::class, 'store'])->name('store');
    Route::get('/edit{id}', [SaleController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [SaleController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [SaleController::class, 'destroy'])->name('destroy');
});


// Detail Sale
Route::middleware('isLogin')->prefix('/detailsale')->name('detailsale.')->group(function () {
    Route::get('/', [DetailSaleController::class, 'index'])->name('index');
    Route::get('/create-detailsale', [DetailSaleController::class, 'create'])->name('create');
    Route::post('/create-detailsale', [DetailSaleController::class, 'store'])->name('store');
    Route::get('/edit{id}', [DetailSaleController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [DetailSaleController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [DetailSaleController::class, 'destroy'])->name('destroy'); 
});
