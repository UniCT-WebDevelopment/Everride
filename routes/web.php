<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Mail\NewUserWelcomeMail;
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



Auth::routes();


Route::get('/email', function(){

    return new NewUserWelcomeMail();
});


Route::get('/home', function(){

    return view('home');
});

Route::get('/intro' ,function(){

    return view('intro');
}) ;


Route::post('/follow/{user}', 'FollowersController@store');
Route::post('/like/{post}', 'LikesController@store');
Route::post('/likemap/{map}', 'LikesController@storemap');

Route::get('/like/{post}', 'LikesController@show');
Route::get('/likemap/{map}', 'LikesController@showmap');



Route::get('/profile/search' ,'ProfilesController@search') ;
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/followers/{user}', 'ProfilesController@followers');
Route::get('/profile/following/{user}', 'ProfilesController@following');


Route::get('/','PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::get('/p/createmap/{map}', 'PostsController@createmap');

Route::post('/p', 'PostsController@store');
Route::post('/pmap', 'PostsController@storemap');

Route::get('/p/{post}', 'PostsController@show');
Route::get('/p/{post}/edit','PostsController@edit');
Route::patch('/p/{post}','PostsController@update');
Route::delete('/p/{post}','PostsController@destroy');


Route::get('/comments/{post}/create','CommentsController@create');
Route::post('/comments/{post}','CommentsController@store');
Route::get('/comments/{comment}/edit','CommentsController@edit');
Route::patch('/comments/{comment}','CommentsController@update');
Route::delete('/comments/{comment}','CommentsController@destroy');


Route::get('/garage/create', 'GaragesController@create');
Route::get('/garage/{garage}', 'GaragesController@show');
Route::get('/garage/index/{user}', 'GaragesController@index');
Route::get('/garage/{garage}/edit','GaragesController@edit');
Route::post('/garage','GaragesController@store');
Route::patch('/garage/{garage}','GaragesController@update');
Route::delete('/garage/{garage}','GaragesController@destroy');


Route::get('/feeds/{user}','FeedsController@index');


Route::get('/maps/show/{map}', 'MapsController@show');
Route::get('/maps/create', 'MapsController@create');
Route::get('/maps/index/{user}', 'MapsController@index');

Route::get('/maps/{map}/edit','MapsController@edit');
Route::post('/maps/gpxlog','MapsController@storegpxlog');
Route::patch('/maps/{map}','MapsController@update');
Route::delete('/maps/{map}','MapsController@destroy');
Route::post('/maps/gpxfile','MapsController@storegpxfile');









