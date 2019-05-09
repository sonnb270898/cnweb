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





Route::group(["middleware"=>"auth"],function(){

// Tạo bài viết, xem bài viết

	Route::group(['prefix'=>'class/{id}'],function(){

		Route::get('/',"ClassController@getClass");

		Route::get('/discussion', "PostController@getDiscussion");

		Route::post('/discussion', "PostController@postDiscussion");

		Route::get('/discussion/{pid}','PostController@getViewDiscussion')->name('discussion');

		Route::post('/discussion/{pid}','PostController@postComment');

		Route::get('/list',"UserController@getlist")->name('userlist');

		Route::get('/info',"ClassController@getClassInfo")->name('classinfo');

		Route::get('/discussion/{pid}/edit','PostController@getEditDiscussion')->name('editform');

		Route::post('/discussion/{pid}/edit','PostController@postEditDiscussion');
		Route::get('/discussion/{pid}/del','PostController@delDiscussion');
		// Route::post("comment/{id}","PostController@comment");
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::post('getcomment','AjaxController@getcomment');
		Route::post("repcomment","AjaxController@repcomment");
	});
	

	//Xem thông tin cá nhân
	Route::get('profile', "UserController@getProfile")->name("profile");
	Route::post('profile', "UserController@postProfile");

	//Tham gia lớp
	Route::get('join', "ClassController@getJoinClass")->name('join');

	Route::post("join","ClassController@postJoinClass");

	//Tạo lớp
	Route::get('create', "ClassController@getCreateClass")->name('create');

	Route::post("create","ClassController@postCreateClass");

	//
	Route::get('/', "UserController@user")->name('user');
	
});

Route::get('addadmin','LoginController@addAdmin');

Route::get('admin/login','LoginController@getAdminLogin');

Route::post('admin/login','LoginController@postAdminLogin');

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

	Route::get('/','AdminController@getAdminHome')->name('admin.home');

	Route::get('class/{cid}','AdminController@getClass')->name('admin.class');

	Route::get('class/{cid}/edit','AdminController@getEditClass');

	Route::post('class/{cid}/edit','AdminController@postEditClass');

	Route::get('class/{cid}/user','AdminController@getUserClass')->name('admin.user');

	Route::get('class/{cid}/user/{uid}/edit','AdminController@getEditUser');

	Route::post('class/{cid}/user/{uid}/edit','AdminController@postEditUser');

	Route::get('class/{cid}/topic','AdminController@getTopic')->name('admin.topic');

	Route::get('class/{cid}/topic/{pid}/edit','AdminController@getEditTopic');

	Route::post('class/{cid}/topic/{pid}/edit','AdminController@postEditTopic');
});


