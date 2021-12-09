<?php

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

Route::get('/', [App\Http\Controllers\AffiliateController::class, 'form'])->name('home');
Route::post('/results', [App\Http\Controllers\AffiliateController::class, 'submitForm'])->name('submit.form');

