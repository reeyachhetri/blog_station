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
// To welcome page

Route::get('/', 'App\Http\Controllers\WelcomeController@index');


// To blog page
Route::get('/blogstation', 'App\Http\Controllers\BlogController@index');

Route::get('/blog/details', 'App\Http\Controllers\BlogController@show');

// To about us page
Route::get('/aboutus', function(){
    return view('aboutus');
});

// To contact page
Route::get('/contactus', 'App\Http\Controllers\ContactController@index');
