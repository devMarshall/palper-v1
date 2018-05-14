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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/my/main', 'PagesController@myProfile_main')->name('my-profile.main');
Route::get('/profile/my/posts', 'PagesController@myProfile_myPosts')->name('my-profile.posts');
Route::get('/profile/my/followers', 'PagesController@myProfile_Followers')->name('my-profile.followers');
Route::get('/profile/my/following', 'PagesController@myProfile_Following')->name('my-profile.following');
Route::get('/profile/my/brands', 'PagesController@myProfile_myBrands')->name('my-profile.brands');


