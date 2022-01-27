<?php

use App\Http\Controllers\LandingPageController;

use App\Http\Controllers\GangaController;


use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingPageController::class, 'index']);



Route::resource('ganga',GangaController::class);

Route::get('/gangaOfertas',[GangaController::class,'indexOfDiscountPrice']);

Route::get('/contacte', function() {
    return view('contacte');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
