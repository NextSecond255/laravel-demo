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

Route::get('/child', function () {
	return view('child');
});
Route::get('/welcome', function () {
	return view('start', [
		'name' => 'Hello world!',
		'content' => '<script type="text/javascript">alert("1111");</script>',
		'array' => ['name' => 'test', 'created_at' => time()]
	]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Web'], function () {
	//默认欢迎页
	Route::get('/', function () {
		return view('welcome');
	});

	//用户
	Auth::Routes();

	Route::get('/home', 'DefaultsController@index')->name('home');

	// 用户中心。
	Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

	// 分类中心
	Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

	//话题中心
	Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'update', 'create', 'store', 'edit', 'destroy']]);

    Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

	//图片上传
    Route::post('upload', 'TopicsController@upload')->name('topics.upload');
    // 话题回复。
    Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
    // 回复通知。
    Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);
});
