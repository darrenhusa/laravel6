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

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/about', function () {
    $articles = App\Article::take(3)->latest()->get();

    // return $articles;
    return view('about', compact('articles'));
});

Route::get('/articles', 'ArticlesController@index');
Route::post('/articles', 'ArticlesController@store');
// Route::put('/articles', 'ArticlesController@update');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');
// Route::delete('/articles/{article}', 'ArticlesController@destroy');
// Route::get('/articles/{article}/edit', 'ArticlesController@edit');
