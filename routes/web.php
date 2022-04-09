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
Route::middleware(['notLogin'])->group(function () {
    Route::get('/login', 'LoginController@index')->name('login.index');
    Route::post('/login-authentication', 'LoginController@authentication')->name('login-authentication');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'admin\dashboard\HomeController@index')->name('admin.dashboard');
    Route::get('/admin/daftar-admin', 'admin\admin\AdminController@daftarAdmin')->name('admin.daftar-admin');

    Route::get('/admin/tambah-admin', 'admin\admin\AdminController@tambahAdmin')->name('admin.tambah-admin');
    Route::post('/admin/tambah-admin', 'admin\admin\AdminController@store')->name('admin.tambah-admin.store');

    Route::get('/admin/edit-admin/{id}', 'admin\admin\AdminController@edit')->name('admin.edit-admin');
    Route::put('/admin/update-admin/{id}', 'admin\admin\AdminController@update')->name('admin.update-admin');

    Route::get('/admin/hapus-admin/{id}', 'admin\admin\AdminController@delete')->name('admin.hapus-admin');

    Route::get('/anggota/daftar-anggota', 'admin\anggota\AnggotaController@daftarAnggota')->name('anggota.daftar-anggota');
    Route::get('/anggota/tambah-anggota', 'admin\anggota\AnggotaController@tambahAnggota')->name('anggota.tambah-anggota');
    Route::post('/anggota/tambah-anggota', 'admin\anggota\AnggotaController@store')->name('anggota.tambah-anggota.store');
    Route::get('/anggota/hapus-anggota/{id}', 'admin\anggota\AnggotaController@delete')->name('anggota.hapus-anggota');


    Route::get('/logout', 'LogoutController@logout')->name('logout');
});
