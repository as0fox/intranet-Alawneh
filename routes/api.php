<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\EventController;

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
Route::get('/currency-rates', [CurrencyController::class, 'index']);
Route::get('/currency-rates/{currency}', [CurrencyController::class, 'getRates']);
Route::get('/currency-convert/{from}/{to}/{amount}', [CurrencyController::class, 'convert']);
Route::get('/currencies', [CurrencyController::class, 'currencies']);
Route::get('/events', [EventController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});