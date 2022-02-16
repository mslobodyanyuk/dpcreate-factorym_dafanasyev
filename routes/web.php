<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreationalPatternsController;

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

Route::get('/', [CreationalPatternsController::class, 'FactoryMethod'])->name('dump');
