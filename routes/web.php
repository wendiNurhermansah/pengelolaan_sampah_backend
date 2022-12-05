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





});




