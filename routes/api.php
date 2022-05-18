<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [TestController::class, 'test']);

Route::prefix('articles')->group(function(){
    Route::get('/{id}', [ArticleController::class, 'show']);
});

Route::prefix('blogs')->group(function(){
    Route::get('/{id}', [BlogController::class, 'show']);
});

Route::fallback(function(){
    return response()->json(['error' => 'Invalid route'], 404);
});
