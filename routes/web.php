<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);
Route::get('/biens', [\App\Http\Controllers\PropertyController::class,'index'])->name('property.biens');
Route::get('/property/{property}',[\App\Http\Controllers\PropertyController::class,'show'])->name('property.show');
Route::get('/miniature', [\App\Http\Controllers\PropertyController::class,'miniatures'])->name('property.miniature');
Route::post('/Property/contact/{property}/',[App\Http\Controllers\PropertyController::class,'contact'])->name('property.contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('property',PropertyController::class)->except('show');
    Route::resource('option',OptionController::class)->except('show');
    Route::match(['get', 'post'], 'deleteall', [PropertyController::class, 'deleteAllProperties']);
});


require __DIR__.'/auth.php';

