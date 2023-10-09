<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewController;

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

Route::post('register', [NewController::class, 'register']);
Route::post('login', [NewController::class, 'login']);


Route::middleware('auth.api')->group(function () {
});;

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});
