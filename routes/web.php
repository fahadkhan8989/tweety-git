<?php

use App\Http\Controllers\ProfilesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store');
    Route::get('/developer', function () {
        return view('profiles.developer');
    })->name('developer');
    Route::post('/tweets/{tweet}/like', 'LikesController@store');
    Route::delete('/tweets/{tweet}/like', 'LikesController@destroy');
    Route::post('/profile/{user:username}/follow', 'FollowsController@store');
    Route::get('/profile/{user:username}/edit', 'ProfilesController@edit');
    Route::delete('/profile/{user:username}/unfollow', 'FollowsController@destroy');
    Route::patch('/profile/{user:username}', 'ProfilesController@update')->name('profile');
    Route::get('/explore', 'ExploreController@index');
    Route::delete('/tweets/{tweet}', 'Tweetcontroller@destroy')->name('delete-tweet');
});

Route::get('/profile/{user:username}', 'ProfilesController@show')->name('profile');



Auth::routes();
