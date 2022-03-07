<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
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
// Wanted to use AuthController here but it's reserved so I'm just using the basic RegisterController.
Route::post('/register', [RegisterController::class, 'register']);

Route::group([
    'middleware' => 'auth.basic.once'
], function () {
    Route::any('/logout', [AuthController::class, 'logout']);
    Route::any('/user', [AuthController::class, 'user']);
    Route::resource('profile', ProfileController::class);
    Route::resource('books', BooksController::class);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page not found.'
    ], 404);
});