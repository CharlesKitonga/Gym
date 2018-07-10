<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//List Articles
Route::get('articles', 'ArticleController@index');

//List Single Article
Route::get('article/{id}', 'ArticleController@show');

//Create New Article
Route::post('article', 'ArticleController@store');

//Update Article
Route::put('article', 'ArticleController@store');

//Delete Article
Route::delete('article/{id}', 'ArticleController@destroy');

//Get Register/login Routes
Auth::routes();

//User Register Route
Route::get('users/{id}', 'UserController@index');
Route::post('users/register', 'UserController@insertUser');

//Session Routes
Route::get('sessions', 'WorkoutController@index');
Route::post('sessions/insert', 'WorkoutController@insertSession');



