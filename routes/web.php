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
Route::get('/blog/create', 'App\Http\Controllers\BlogController@create')->name('blog.create')->middleware('auth');

// To edit blog post
Route::get('/blog/edit/{id}', 'App\Http\Controllers\BlogController@edit')->name('blog.edit')->middleware('auth');

// To update blog post
Route::post('/blog/update/{id}', 'App\Http\Controllers\BlogController@update')->name('blog.update')->middleware('auth');

// To delete blog post
Route::get('/blog/delete/{id}', 'App\Http\Controllers\BlogController@destroy')->name('blog.delete');

// To store blog post to DB
Route::post('/blog/store', 'App\Http\Controllers\BlogController@store')->name('blog.store');

// To details page
Route::get('/blog/{post:slug}', 'App\Http\Controllers\BlogController@show')->name('blog.show');

// To contact page
Route::get('/contact-us', 'App\Http\Controllers\ContactController@index')->name('contact.index');

// To store contacts
Route::post('/send-message', 'App\Http\Controllers\ContactController@store')->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/home', function () {
    return view('admin.home');

});
