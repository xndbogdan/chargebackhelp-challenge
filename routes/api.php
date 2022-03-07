<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Wanted to use AuthController here but it's reserved so I made a new Controller
Route::post('/register', [RegisterController::class, 'register']);
Route::group([
    'middleware' => 'auth.basic.once'
], function () {
    Route::any('/logout', [AuthController::class, 'logout']);
    Route::any('/user', [AuthController::class, 'user']);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page not found.'
    ], 404);
});