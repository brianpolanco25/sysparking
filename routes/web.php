<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/administracion', '\App\Http\Controllers\AdminController');

Route::resource('/usuarios', '\App\Http\Controllers\UserController');

Route::resource('/clientes', '\App\Http\Controllers\CustomerController');

Route::resource('/socios', '\App\Http\Controllers\PartnerController');

Route::resource('/roles', '\App\Http\Controllers\RoleController');


