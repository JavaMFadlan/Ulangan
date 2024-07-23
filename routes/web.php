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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('bank', 'CabangBankController');
Route::resource('jenis', 'JenisController');
Route::resource('nasabah', 'NasabahController');
Route::post('/nasabah/pdf', 'NasabahController@pdf')->name('nasabah.pdf');
Route::resource('pegawai', 'PegawaiController');
Route::get('rekening/create/{implode}', 'RekeningController@create');
Route::resource('rekening', 'RekeningController');
Route::resource('kartu', 'KartuController');
