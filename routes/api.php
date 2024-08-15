<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route ::apiResources([
    'departments'=>DepartmentController::class,
    'categories'=>CategoryController::class,
    'barcodes'=>BarcodeController::class,
    'users'=>UserController::class,
    'warehouses'=>WarehouseController::class,
    'transactions'=>TransactionController::class,
    'products'=>ProductController::class,
]);

