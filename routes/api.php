<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\WarehousesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\ApiAuthController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResources([
        'departments' => DepartmentController::class,
        'categories' => CategoryController::class,
        'barcodes' => BarcodeController::class,
        'users' => UserController::class,
        'warehouses' => WarehouseController::class,
        'transactions' => TransactionController::class,
        'products' => ProductController::class,
    ]);


    Route::post('/warehouses/{id}/restore', [WarehouseController::class, 'restore'])->name("warehouses.restore");
    Route::post('/barcode/{id}/restore', [BarcodeController::class, 'restore'])->name("barcode.restore");
    Route::post('/category/{id}/restore', [CategoryController::class, 'restore'])->name("category.restore");
    Route::post('/department/{id}/restore', [DepartmentController::class, 'restore'])->name("department.restore");
    Route::post('/product/{id}/restore', [ProductController::class, 'restore'])->name("product.restore");
    Route::post('/transaction/{id}/restore', [TransactionController::class, 'restore'])->name("transaction.restore");
    Route::post('/user/{id}/restore', [UserController::class, 'restore'])->name("user.restore");

});


Route::post("login", [ApiAuthController::class, "login"])->name("api.login");
