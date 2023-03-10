<?php

use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/banks', BankController::class);

Route::get('/datatable', [BankController::class,'datatable'])->name('datatable');
