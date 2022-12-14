<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('MasterRole')->namespace('masterRole')->name('MasterRole.')->group(function(){
    //role
    Route::get('addpermission/{id}', 'RoleController@permission')->name('role.addpermission');
    Route::post('storePermission', 'RoleController@storePermission')->name('storePermissions');

    Route::post('role/api', 'RoleController@api')->name('role.api');
    Route::get('getPermission/{id}', 'RoleController@getPermission')->name('getPermissions');
    Route::delete('destroyPermission/{name}', 'RoleController@destroyPermission')->name('destroyPermission');
    Route::resource('role', 'RoleController');


    //permissions
    Route::resource('permissions', 'PermissionsController');
    Route::post('permissions/api', 'PermissionsController@api')->name('permissions.api');

    //pengguna
    Route::resource('pengguna', 'PenggunaController');
    Route::post('pengguna/api', 'PenggunaController@api')->name('pengguna.api');
    Route::get('{id}/editPassword', 'PenggunaController@editPassword')->name('editPassword');
    Route::post('{id}/updatePassword', 'PenggunaController@updatePassword')->name('updatePassword');
});

Route::prefix('MasterTpa')->namespace('masterTpa')->name('MasterTpa.')->group(function(){
    //jenis Tpa
    Route::resource('jenis_tpa', 'JenistpaController');
    Route::post('jenis_tpa/api', 'JenistpaController@api')->name('jenis_tpa.api');

    //status TPA
    Route::resource('status_tpa', 'StatustpaController');
    Route::post('status_tpa/api', 'StatustpaController@api')->name('status_tpa.api');

    //TPA
    Route::resource('tpa', 'TpaController');
    Route::post('tpa/api', 'TpaController@api')->name('tpa.api');

    //tambah Tpa
    Route::get('tambah_tpa', 'TpaController@create')->name('tpa.tambah_tpa');

    //alamat
    Route::get('kabupatenByProvinsi/{id}', 'TpaController@kabupatenByProvinsi')->name('kabupatenByProvinsi');
    Route::get('kecamatanByKabupaten/{id}', 'TpaController@kecamatanByKabupaten')->name('kecamatanByKabupaten');
    Route::get('kelurahanByKecamatan/{id}', 'TpaController@kelurahanByKecamatan')->name('kelurahanByKecamatan');

});

Route::prefix('MasterBankSampah')->namespace('masterBankSampah')->name('MasterBankSampah.')->group(function(){
    //jenis bank sampah
    Route::resource('jenis_bank_sampah', 'JenisBankSampahController');
    Route::post('jenis_bank_sampah/api', 'JenisBankSampahController@api')->name('jenis_bank_sampah.api');

    //status bank sampah
    Route::resource('status_bank_sampah', 'StatusBankSampahController');
    Route::post('status_bank_sampah/api', 'StatusBankSampahController@api')->name('status_bank_sampah.api');

    

});

Route::prefix('MasterTps3r')->namespace('masterTps3r')->name('MasterTps3r.')->group(function(){
    //jenis TPS3R
    Route::resource('jenis_tps3r', 'JenisTps3rController');
    Route::post('jenis_tps3r/api', 'JenisTps3rController@api')->name('jenis_tps3r.api');

    //status TPS3R
    Route::resource('status_tps3r', 'StatusTps3rController');
    Route::post('status_tps3r/api', 'StatusTps3rController@api')->name('status_tps3r.api');

    

});


Route::prefix('MasterPengolahan')->namespace('masterPengolahan')->name('MasterPengolahan.')->group(function(){
    //Komposisi Sampah
    Route::resource('komposisi_sampah', 'KomposisiSampahController');
    Route::post('komposisi_sampah/api', 'KomposisiSampahController@api')->name('komposisi_sampah.api');

    //Sumber sampah
    Route::resource('sumber_sampah', 'SumberSampahController');
    Route::post('sumber_sampah/api', 'SumberSampahController@api')->name('sumber_sampah.api');

    

});




