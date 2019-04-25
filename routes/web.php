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
Route::get('login','LoginController@getLogin')->name('login');

Route::post('login','LoginController@postLogin');

Route::get("logout","LoginController@logout")->name("logout");

Route::get('signup', "LoginController@getSignUp")->name('signup');

Route::post("signup","LoginController@postSignUp");

Route::get('class/{id}',"ClassController@getClass");

Route::get('class/{id}/discussion/', "PostController@getDiscussion");

Route::post('class/{id}/discussion/', "PostController@postDiscussion");

Route::get('profile', "UserController@getProfile")->name("profile");

Route::get('join', "ClassController@getJoinClass")->name('join');

Route::post("join","ClassController@postJoinClass");

Route::get('/', "UserController@user")->name('user');



