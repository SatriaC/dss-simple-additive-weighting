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

// Route::get('/jalan', 'jalanController@index');
// Route::get('/jalan/create', 'jalanController@create');
// Route::post('/jalan', 'jalanController@store');
// Route::delete('/jalan/{id}', 'jalanController@destroy');
// Route::get('/jalan/{id}/edit', 'jalanController@edit');
// Route::patch('/jalan/{id}', 'jalanController@update');



Route::get('/register', 'AuthController@getRegister')->middleware('guest')->name('register');
Route::post('/register', 'AuthController@postRegister')->middleware('guest');
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin')->middleware('guest')->name('login');
Route::get('/logout', 'AuthController@logout');
Route::get('/forgot_password', 'AuthController@forgot');
Route::post('/forgot_password', 'AuthController@postForgot')->middleware('guest')->name('forgot');
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::resource('bantuan', 'BantuanController')->middleware('auth');
Route::resource('jalan', 'jalanController')->middleware('auth');
Route::resource('bobot', 'BobotController')->middleware('auth');
Route::resource('kriteria', 'KriteriaController')->middleware('auth');
Route::get('/hitung', 'PerhitunganController@index')->middleware('auth')->name('perhitungan');
Route::get('/hitung/exportpdf', 'PerhitunganController@exportPdf')->middleware('auth')->name('perhitungan.pdf');

Route::group(['middleware'=>'auth'],function() {
    Route::get('/nilai', 'NilaiController@index')->name('nilai');
    Route::get('/nilai/{id}', 'NilaiController@create')->name('nilai.tambah');
    Route::post('/nilai/{id}', 'NilaiController@store')->name('nilai.simpan');
    Route::get('/nilai/edit/{id}', 'NilaiController@edit')->name('nilai.edit');
    Route::post('/nilai/edit/{id}', 'NilaiController@update')->name('nilai.update');
});