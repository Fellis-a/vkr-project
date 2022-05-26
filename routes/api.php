<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VkrController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UsersVacantVkrs;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vkrs', [VkrController::class, 'index']);
Route::get('/titles', [VkrController::class, 'vacant']);
Route::get('/specialties',[SpecialtyController::class,'index']);
Route::get('/users',[UserController::class,'index']);
Route::get('/usersvacant', [VkrController::class, 'vacantUsers']);
Route::get('/years', [VkrController::class, 'filterYear']);
//Route::get('/vacantvkr', [VkrController::class, 'vacant']);
