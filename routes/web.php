<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfileController::class, 'redirect'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';


Route::resource('stock',ProductController::class);
Route::resource('reg',RegisteredUserController::class);
Route::resource('admin',PharmacyController::class);
Route::resource('order',OrderController::class);
Route::get('/registered', [PharmacyController::class, 'registered']);
Route::get('/pending', [PharmacyController::class, 'pending']);
Route::get('/completed_order', [OrderController::class, 'completeOrder']);
Route::get('/pending_order', [OrderController::class, 'pendingOrder']);

Route::get('order/{id}/{timestamp}', [OrderController::class, 'showOrder'])->name('order.showOrder');
Route::post('/order/{id}/{timestamp}', [OrderController::class, 'completed'])->name('order.completed');

Route::get('/status/{id}',[ProductController::class, 'stockStatus'])->name('status.stockStatus');

Route::get('/management', [ProductController::class, 'management'])->name('stock.management');

Route::get('/chat', function(){
    return view('layout.message');
});

Route::get('/admin_chat', function(){
    return view('layout.chat_admin');
});


Route::post('/statusOrder', [ProductController::class, 'statusOrder'])->name('status.statusOrder');

//below function is jut for the testing of some features before implementing
Route::get('/test', function(){
    return view('confirmation');
});

