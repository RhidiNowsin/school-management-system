<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-of-use', [HomeController::class, 'terms_of_use'])->name('terms_of_use');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

});
