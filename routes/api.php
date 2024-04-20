<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\PharmacyTasks;


Route::post('auth/register',[AuthenticationController::class,'register']);
Route::post('auth/login',[AuthenticationController::class,'login']);
Route::post('auth/logout',[AuthenticationController::class,'logout'])
  ->middleware('auth:sanctum');
  Route::post('auth/updateProfile',[AuthenticationController::class,'updateProfile'])
  ->middleware('auth:sanctum');
  
  Route::get('auth/getProfile', [AuthenticationController::class, 'getProfile'])->middleware('auth:sanctum');
  Route::delete('auth/deleteAccount', [AuthenticationController::class, 'deleteAccount'])->middleware('auth:sanctum');

  Route::post('/riskAssesment',[PharmacyTasks::class,'riskAssesment'])
  ->middleware('auth:sanctum');

  Route::get('/getPharmacy', [PharmacyTasks::class, 'getPharmacy']);
Route::get('/getMedicine', [PharmacyTasks::class, 'getMedicine']);

Route::post('/addToCart',[PharmacyTasks::class,'addToCart'])
->middleware('auth:sanctum');
Route::get('/getMyCart',[PharmacyTasks::class,'getMyCart'])
  ->middleware('auth:sanctum');

  Route::delete('/orders/{id}', [PharmacyTasks::class, 'deleteCartItem'])->middleware('auth:sanctum');
  Route::delete('/orderHistory/{id}', [PharmacyTasks::class, 'deleteCartHistoryItem'])->middleware('auth:sanctum');

  Route::post('/moveCartsToOrderHistory',[PharmacyTasks::class,'moveCartsToOrderHistory'])
  ->middleware('auth:sanctum');
  Route::get('/getMyCartHistory',[PharmacyTasks::class,'getMyCartHistory'])
    ->middleware('auth:sanctum');

    Route::post('/sendOrderToPharmacy',[PharmacyTasks::class,'sendOrderToPharmacy'])
    ->middleware('auth:sanctum');