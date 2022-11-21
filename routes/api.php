<?php

use App\Http\Controllers\Guest\DisplayController;
use App\Http\Controllers\Users\InformasisuaraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\DisplayController;
use App\Http\Controllers\Users\PilihkandidatController;
use App\Http\Controllers\Users\InformasisuaraController;

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

// Route::get('/voting', [PilihkandidatController::class, 'suara']);
Route::get('/voting', [DisplayController::class, 'suara']);
Route::get('/suara', [InformasisuaraController::class, 'hasil']);
