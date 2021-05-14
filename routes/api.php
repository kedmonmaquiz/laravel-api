<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products',App\Http\Controllers\ProductController::class);

Route::group(['prefix'=>'products/{product}'],function(){
	Route::apiResource('reviews',App\Http\Controllers\ReviewController::class);
});