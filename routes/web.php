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
    Route::get('get-user', [\App\Http\Controllers\UserController::class, 'select'])->name('get-user.select');
   
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::group(['roles' => 'Admin Kab Landak'], function(){
        Route::resource('users', \App\Http\Controllers\UserController::class);
        Route::resource('opd', \App\Http\Controllers\OPDController::class);
        // Route::get('/opd/delete/{id}');
        Route::resource('unitkerja', \App\Http\Controllers\UnitKerjaController::class);
        Route::resource('jabatan', \App\Http\Controllers\JabatanController::class);
    });

    Route::group(['roles' => 'Admin OPD'],function(){
        // Route::resource('users', \App\Http\Controllers\UserController::class);
    });

    Route::group(['roles' => ['Admin Surat', 'User']], function(){
        Route::resource('log-disposisi', \App\Http\Controllers\AdminSurat\LogDisposisiController::class);
        
        Route::group(['roles' => 'Admin Surat'], function(){
            
            Route::resource('surat-masuk', \App\Http\Controllers\AdminSurat\SuratMasukController::class);
            Route::get('surat-masuk/{id}/file', [\App\Http\Controllers\AdminSurat\SuratMasukController::class, 'file'])->name('sm.file');
            Route::post('surat-masuk/{id}/kirim', [\App\Http\Controllers\AdminSurat\SuratMasukController::class, 'kirim'])->name('sm.kirim');
            
            Route::resource('surat-keluar', \App\Http\Controllers\AdminSurat\SuratKeluarController::class);
            Route::resource('surat-disposisi', \App\Http\Controllers\AdminSurat\DisposisiController::class);

            Route::resource('log-surat-masuk', \App\Http\Controllers\AdminSurat\LogSuratMasukController::class);
            Route::resource('log-surat-keluar', \App\Http\Controllers\AdminSurat\LogSuratKeluarController::class);
            // Route::resource('log-disposisi', AdminSurat\LogDisposisiController::class);

            Route::resource('daftar-penandatangan', \App\Http\Controllers\AdminSurat\TandatanganController::class);
            Route::resource('daftar-verifikator', \App\Http\Controllers\AdminSurat\VerifikatorController::class);

            Route::group(['prefix' => 'daftar-tujuan'], function () {
                Route::get('/', [\App\Http\Controllers\AdminSurat\TujuanController::class, 'index'])->name('tujuan.index');

                Route::post('/internal', [\App\Http\Controllers\AdminSurat\TujuanController::class, 'storeInternal'])->name('internal.store');
                Route::post('/eksternal', [\App\Http\Controllers\AdminSurat\TujuanController::class, 'storeEksternal'])->name('eksternal.store');
            });

            Route::resource('daftar-grup-tujuan', \App\Http\Controllers\AdminSurat\GrupTujuanController::class);
            Route::resource('daftar-tembusan', \App\Http\Controllers\AdminSurat\TembusanController::class);
            Route::resource('template-surat', \App\Http\Controllers\AdminSurat\JenisSuratController::class);
            //Route::get('/dashboard', [\App\Http\Controllers\AdminSurat\AdminSuratController::class, 'index']);
        });

        Route::group(['roles' => 'User'], function(){
            // Route::group(['prefix' => 'surat'], function(){
                // Route::resource('tandatangan', TandatanganController::class);
                // Route::resource('verifikasi', VerifikatorController::class);
                Route::group(['prefix' => 'disposisi'], function(){
                    Route::resource('/', \App\Http\Controllers\User\DisposisiController::class);
                    Route::get('/{id}', [\App\Http\Controllers\User\DisposisiController::class, 'show'])->name('disposisi.detail');
                    Route::get('/{id}/disposisi', [\App\Http\Controllers\User\DisposisiController::class, 'disposisi'])->name('disposisi');
                    Route::post('/{id}/disposisi', [\App\Http\Controllers\User\DisposisiController::class, 'kirimdisposisi'])->name('disposisi.kirim');

                });

                Route::group(['prefix' => 'tindak-lanjut'], function(){
                    Route::resource('/', \App\Http\Controllers\User\TindakLanjutController::class);
                    Route::get('/{id}', [\App\Http\Controllers\User\TindakLanjutController::class, 'show']);
                    Route::get('/{id}/tl', [\App\Http\Controllers\User\TindakLanjutController::class, 'tl'])->name('tl');
                    Route::post('/{id}/tl', [\App\Http\Controllers\User\TindakLanjutController::class, 'kirimtl'])->name('tl.kirim');
                    Route::post('/{id}/selesai', [\App\Http\Controllers\User\TindakLanjutController::class, 'selesaitl'])->name('tl.selesai');
                });

                Route::group(['prefix' => 'suratmasuk'], function(){
                    Route::resource('/', \App\Http\Controllers\User\SuratMasukController::class);
                    Route::post('/{id}', [\App\Http\Controllers\User\SuratMasukController::class, 'detail'])->name('sm.detail');
                });
                // Route::resource('keluar', SuratKeluarController::class);
                // Route::resource('tembusan', TembusanController::class);
        });
    });


    //PROJEK TATA NASKAH
    // Route::group(['roles' => 'Admin OPD TNDE'],function(){
    //     // Route::resource('naskah-masuk', \App\Http\Controllers\AdminSurat\SuratMasukController::class);
    //     Route::resource('naskah-keluar', \App\Http\Controllers\AdminTNDE\NaskahKeluarController::class);
    //     // Route::resource('naskah-disposisi', \App\Http\Controllers\AdminSurat\DisposisiController::class);

    //     // Route::resource('log-naskah-masuk', \App\Http\Controllers\AdminSurat\LogSuratMasukController::class);
    //     Route::resource('log-naskah-keluar', \App\Http\Controllers\AdminTNDE\LogNaskahKeluarController::class);

    //     Route::resource('daftar-penandatangan', \App\Http\Controllers\AdminSurat\TandatanganController::class);
    //     Route::resource('daftar-verifikator', \App\Http\Controllers\AdminSurat\VerifikatorController::class);

    //     Route::group(['prefix' => 'daftar-tujuan'], function () {
    //         Route::get('/', [\App\Http\Controllers\AdminSurat\TujuanController::class, 'index'])->name('tujuan.index');

    //         Route::post('/internal', [\App\Http\Controllers\AdminSurat\TujuanController::class, 'storeInternal'])->name('internal.store');
    //         Route::post('/eksternal', [\App\Http\Controllers\AdminSurat\TujuanController::class, 'storeEksternal'])->name('eksternal.store');
    //     });

    //     Route::resource('daftar-grup-tujuan', \App\Http\Controllers\AdminSurat\GrupTujuanController::class);
    //     Route::resource('daftar-tembusan', \App\Http\Controllers\AdminSurat\TembusanController::class);
        
    //     Route::resource('template-naskah', \App\Http\Controllers\AdminTNDE\TemplateNaskahController::class);
    // });
});