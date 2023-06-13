<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);
Route::get('/biens', [\App\Http\Controllers\PropertyController::class,'index'])->name('property.biens');
Route::get('/miniature', [\App\Http\Controllers\PropertyController::class,'miniatures'])->name('property.miniature');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('property',PropertyController::class)->except('show');
    Route::resource('option',OptionController::class)->except('show');
    Route::match(['get', 'post'], 'deleteall', [PropertyController::class, 'deleteAllProperties']);
});
Route::get('login',[\App\Http\Controllers\AuthController::class,'loginform'])
    ->middleware('guest')
    ->name('login');
Route::post('logon',[\App\Http\Controllers\AuthController::class,'logincheck'])->name('logincheck');
Route::post('logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
