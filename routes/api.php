<?php

use App\Http\Controllers\AgfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('agf', AgfController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('sale', SaleController::class);
