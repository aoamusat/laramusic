<?php

/*use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route as Route;*/

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('admin/login','AdminController@getLogin')
		->name('admin_login');

Route::post('admin/login','AdminController@postLogin');

Route::get('admin/dashboard','AdminController@getDashboard')
		->name('admin_dashboard');

Route::get('admin/logout','AdminController@logout')->name('logout');

Route::get('search','HomeController@search');
Route::get('admin/dashboard/view_all_music','AdminController@viewMusic');
Route::get('admin/dashboard/adduser','AdminController@getAddMod')
            ->name('getAddMod');
Route::post('admin/dashboard/adduser','AdminController@addmod');

Route::get('admin/dashboard/addmusic',function (){
    return view('admin.addmusic');
})->name('addmusic');

Route::post('admin/dashboard/addmusic','AdminController@addmusic');

Route::get('/music/{id}/{title}/download','HomeController@download');


/*Route::get('/login',function (){
    return view('errors.404');
})->name('login');

Route::get('/register',function (){
    return view('errors.404');
})->name('register');*/
