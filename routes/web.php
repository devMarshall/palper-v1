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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home')->middleware('auth');

Route::get('/profile/my/main', 'PagesController@myProfile_main')->name('my-profile.main')->middleware('auth');
Route::get('/profile/my/main/edit', 'PagesController@myProfile_main_edit')->name('my-profile.main.edit')->middleware('auth');

// Route::get('/profile/my/posts', 'PagesController@myProfile_myPosts')->name('my-profile.posts')->middleware('auth');
// Route::get('/profile/my/followers', 'PagesController@myProfile_Followers')->name('my-profile.followers')->middleware('auth');
Route::get('/profile/my/following', 'PagesController@myProfile_Following')->name('my-profile.following')->middleware('auth');
Route::get('/profile/my/brands', 'PagesController@myProfile_myBrands')->name('my-profile.brands')->middleware('auth');

Route::get('/create/brand', 'PagesController@newBrand')->name('create.brand')->middleware('auth');

Route::post('/create/brand', 'BrandController@create')->name('new.brand')->middleware('auth');

Route::post('/edit/user', 'UserController@updateProfile')->name('edit.profile')->middleware('auth');

Route::post('/create/post', 'PostsController@create')->name('create.post')->middleware('auth');

Route::get('/feed', 'PagesController@getFeed');