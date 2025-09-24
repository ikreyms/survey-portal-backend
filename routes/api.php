<?php

use App\Http\Controllers\Api\v1\IslandController;
use App\Http\Controllers\IslandCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('islands', IslandController::class);
    Route::apiResource('island-categories', IslandCategoryController::class);
});
