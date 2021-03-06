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

// For Category
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::delete('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');

// For User
Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::post('/user/{id}', 'UserController@update')->name('user.update');


// For Ckeditor
Route::post('ckeditor/image_upload', 'PostController@upload')->name('upload');



Route::resource('admin', 'PostController');
Auth::routes(['register' => false]);


// Static pages
Route::get('/about', function(){
    return view('pages.about');
});
Route::get('/objectives', function(){
    return view('pages.objectives');
});

