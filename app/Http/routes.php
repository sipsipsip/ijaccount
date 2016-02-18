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


/* ------------------------------------------
    TEST ROUTE
    ----------------------------------------- */
Route::get('/pegawai', function(){
    return \App\Models\Pegawai::paginate(1);
});


/* -------------------------------------------
    PUBLIC ROUTE
    ------------------------------------------ */
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');



/* -------------------------------------------
    ADMIN SPECIFIC FITURES
    ------------------------------------------ */
// Aplikasi
Route::get('tambah_aplikasi', 'ApiController@getTambahAplikasi');



/* ---------------------------------
    APPLICATION API ENDPOINTS :: API
    -------------------------------- */
Route::group(['prefix'=>'api/v1'], function(){
    /** DATA API ENDPOINT **/
    /** usage for querying any models, or keyword, paginate, etc **/
    Route::get('data', 'ApiController@getData');


    /** API CRUD **/
    Route::controllers(['general'=>'CRUDController']);


    /** API USERS **/
    Route::get('users/current', 'ApiController@apiCurrentUser');

    /** API APLIKASI **/
    Route::get('applications', 'ApiController@apiApplications');
    Route::post('applications/add', 'ApiController@apiApplicationsAdd');
    Route::post('applications/{id}/delete', 'ApiController@apiApplicationsDelete');
    Route::get('applications/{id}', 'ApiController@apiApplicationsFind');
    Route::post('applications/{id}/update', 'ApiController@apiApplicationsUpdate');


    /** API APPLICATION TAGS **/
    Route::controllers(['apptags'=> 'AppTagController']);
});



/* -----------------------------------
    SINGLE LOGIN ROUTING
    ---------------------------------- */
Route::get('check-auth', 'AuthController@checkAuth');


