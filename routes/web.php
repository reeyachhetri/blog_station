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


// To create blog post
Route::get('/blog/create', 'App\Http\Controllers\BlogController@create')->name('blog.create');

// To store blog post to DB
Route::post('/blog/store', 'App\Http\Controllers\BlogController@store')->name('blog.store');

// To details page
Route::get('/blog/{post:slug}', 'App\Http\Controllers\BlogController@show')->name('blog.show');

// To about us page
Route::get('/about-us', function(){
    return view('aboutus');
})->name('about');

// To contact page
Route::get('/contact-us', 'App\Http\Controllers\ContactController@index')->name('contact.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
