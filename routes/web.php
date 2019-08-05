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


Route::group(['middleware'=>'auth'], function () {
    
    //create another route 
    Route::get('/users', 'HomeController@showUsers');
    Route::get('/user/follow/{id}', 'UserController@follow');
    Route::get('/user/unfollow/{id}', 'UserController@unfollow');
    Route::post('/blog/store', 'BlogController@store');
    Route::get('/home', 'HomeController@index');
    Route::get('/edit/{id}', 'BlogController@edit');
    Route::post('/update/{id}', 'BlogController@update');
    Route::post('/delete/{id}', 'BlogController@delete');
    Route::get('/users/edit/{id}', 'UserController@edit');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::get('/user/profile/{id}', 'HomeController@showUser');
    Route::get('/user/followinglist', 'UserController@showFollowing');
    Route::get('/user/followerslist', 'UserController@showFollowers');
    // Route::get('/like/{id}', 'BlogController@like');    
    // Route::get('/dislike/{id}', 'BlogController@dislike');    

    // Route::post('/blogs/{blog}/likes', 'LikesController@store');
    // Route::post('/blogs/{blog}/likes/{like}', 'LikesController@destroy');

    Route::resource('blog', 'BlogsController', ['only' => ['create', 'store', 'show']]);

});


