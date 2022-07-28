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

/*
Roles :
1. Admin Kab Landak
2. Admin OPD
3. Admin Surat
4. Sekretaris
5. Kepala Dinas
6. KabidKabag
7. Kasi
8. User
*/

Route::group(['middleware' => ['web', 'auth', 'roles']],function(){
    // select2
    Route::get('get-opd', [\App\Http\Controllers\OPDController::class, 'select'])->name('get-opd.select');
    Route::get('get-unitkerja', [\App\Http\Controllers\UnitKerjaController::class, 'select'])->name('get-unitkerja.select');
    Route::get('get-jabatan', [\App\Http\Controllers\JabatanController::class, 'select'])->name('get-jabatan.select');

    Route::group(['roles' => 'Admin Kab Landak'],function(){
        Route::get('dashboard', 'App\Http\Controllers\AdminKabController@index')->name('dashboard.admin');
        Route::resource('users', \App\Http\Controllers\UserController::class);
        Route::resource('opd', \App\Http\Controllers\OPDController::class);
        Route::resource('unitkerja', \App\Http\Controllers\UnitKerjaController::class);
        Route::resource('jabatan', \App\Http\Controllers\JabatanController::class);
    });

    Route::group(['roles' => 'Admin OPD'],function(){
        // Route::get('user', 'App\Http\Controllers\OPDController@index')->name('dashboard.adminopd');
        // Route::resource('users', \App\Http\Controllers\UserController::class);
    });
});