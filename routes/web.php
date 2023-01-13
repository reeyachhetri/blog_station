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

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome.index');


// To blog page
Route::get('/blogstation', 'App\Http\Controllers\BlogController@index')->name('blog.index');

// To details page
Route::get('/blog/details', 'App\Http\Controllers\BlogController@show')->name('blog.show');

// To about us page
Route::get('/about-us', function(){
    return view('aboutus');
})->name('about');

// To contact page
Route::get('/contact-us', 'App\Http\Controllers\ContactController@index')->name('contact.index');
