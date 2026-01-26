<?php
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
Route::apiResource('products', ProductController::class);
Route::get('products/filter/{q}', [ProductController::class, 'filter']);
?>