<?php

use App\Http\Controllers\ClinicsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorsController;

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
Route::get('/h', function () {
    return view('superAdmin.home');
});


Route::resource('clinics', 'ClinicsController');
Route::resource('doctors', 'DoctorsController');
Route::resource('lapDoctors', 'lapDoctorsController');
//specialties
Route::get('/specialties/create', 'SpecialistsController@create');
Route::get('/specialties', 'SpecialistsController@index');
Route::post('/specialties', 'SpecialistsController@store');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
