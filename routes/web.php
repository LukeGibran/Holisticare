<?php

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

// For pages controller
Route::get('/','PagesController@index')->name('index');
Route::get('/page/{category}','PagesController@page')->name('page');
Route::get('/show/{id}', 'PagesController@show')->name('show');
Route::get('/search', 'PagesController@search')->name('search');

// For contact
Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store')->name('contact.store');

Route::post('ckeditor/image_upload', 'PostController@upload')->name('upload');

Route::get('/about', function(){
    return view('pages.about');
});
Route::get('/objectives', function(){
    return view('pages.objectives');
});


Route::resource('admin', 'PostController');
Auth::routes(['register' => false]);

Route::get('/viewEmail', function(){
    return view('emails.contact.contact');
});
