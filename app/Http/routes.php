<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/* -------------------------------------------
    AUTHENTICATION ROUTE
    ------------------------------------------ */
Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@getLogout');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/* -------------------------------------------
    PUBLIC ROUTE
    ------------------------------------------ */
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');



/* -------------------------------------------
    ADMIN SPECIFIC FITURES
    ------------------------------------------ */
// Aplikasi
Route::get('tambah_aplikasi', 'ApplicationController@getTambahAplikasi');



/* ---------------------------------
    APPLICATION API ENDPOINTS :: API
    -------------------------------- */
Route::group(['prefix'=>'api/v1'], function(){
    /** API APLIKASI **/
    Route::get('aplikasi', 'ApplicationController@apiIndex');
});



/* -----------------------------------
    SINGLE LOGIN ROUTING
    ---------------------------------- */
Route::get('check-auth', 'AuthController@checkAuth');


Route::post('upload/image', function(){
    $image = \Input::file('image');
    $filename = $image->getClientOriginalName();
    $extension = $image->getClientOriginalExtension();

    $image->move('images/ikon_aplikasi/',$filename);

    $uploadedPath = $image->getRealPath();

    \Eloquent::unguard();
    $aplikasi = new \App\Models\Aplikasi();
    $aplikasi->nama_aplikasi = \Input::get('namaAplikasi');
    $aplikasi->deskripsi = \Input::get('deskripsi');
    $aplikasi->icon_url = 'images/ikon_aplikasi/'.$filename;


    if($aplikasi->save()){
        return 1;
    } else {
        return 0;
    }

});