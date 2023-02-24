<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('items')->group(function () {
    Route::post('', [ItemController::class,'store']);
    Route::get('', [ItemController::class,'getItem']);
    Route::put('{id}', [ItemController::class,'update']);
});




