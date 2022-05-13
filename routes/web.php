<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VkrController;
use App\Http\Controllers\AddVkrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicVkrController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/vkrs', [VkrController::class, 'vkrsList'])->name('main2');
//Route::get('/search', [VkrController::class, 'search'])->name('vkr-search');
//Route::resource('vkr', PublicVkrController::class);
Route::get('/search',[VkrController::class, 'search'])->name('search-vkr');
Route::get('/find',[VkrController::class, 'find'])->name('find-vkr');
Route::get('/vkrs', function(){
    return view('welcome');
});

Route::get('vkr/{id}', [VkrController::class, 'show'])->name('vkr-single');
Route::get('/', [VkrController::class, 'index'])->name('main');

Auth::routes();


//Route::get('/home/vkr', [VkrController::class, 'show'])->name('vkr-page');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/vkr/{id}', [HomeController::class, 'showOneVkr'])->name('vkr-one');//проблема тут
Route::get('/home/{id}/edit', [HomeController::class, 'edit'])->name('vkr-edit');
Route::post('/home/{id}/edit/update', [HomeController::class, 'update'])->name('vkr-update');
Route::get('/home/{id}/delete', [HomeController::class, 'destroy'])->name('vkr-delete');
Route::get('/home/create', [HomeController::class, 'create'])->name('vkr-create');
Route::post('/home/create/submit', [HomeController::class, 'store'])->name('vkr-addForm');
