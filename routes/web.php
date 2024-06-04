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


Route::get('/chat', function(){
    return view('layout.message');
});

Route::get('/admin_chat', function(){
    return view('layout.chat_admin');
});



//below function is just for the testing of some features before implementing even you Bunasta vina you can use it
Route::get('/test', function(){
    return view('test');
});
