<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('register','RegisterController');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/video', function () {
    return view('video');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/oursolution', function () {
    return view('oursolution');
});
Route::get('/partners', function () {
    return view('partners');
});
Route::get('/map', function () {
    return view('map');
});
Route::get('/ourteam', function () {
    return view('ourteam');
});
Route::get('refresh_captcha', 'RegisterController@refreshCaptcha')->name('refresh_captcha');
Route::get('my-captcha', 'RegisterController@myCaptcha')->name('myCaptcha');
Route::post('my-captcha', 'RegisterController@myCaptchaPost')->name('myCaptcha.post');

//step 1 : mot chercher + country
Route::get('/admin/appoitement/{id}/{type}/{idcountry}', 'admin\AppoitementController@validateappoitement')->name('admin');

// step 2 structures medicaux liées au specialités
Route::get('/sp_md_doc/{idspeciality}/{idmedicalstructure}', 'admin\AppoitementController@doctorspecialitymedicalstructure');

// step 2 disponibilité par docteur
Route::get('/appoitementofdoctor/{iddoctor}', 'admin\AppoitementController@appoitementofdoctor');

// step 2 validation : insertion dans la base de données
Route::get('/validerappoitement/{iddoctor}/{idmedicalstructure}/{date}/{time}/{idspeciality}', 'admin\AppoitementController@validerappoitement');

// delete zone

Route::delete('/zonedestroy', 'admin\ZoneController@destroy');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

