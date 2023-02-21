
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('about', 'App\Http\Controllers\PageController@about')->name('about');

Route::get('some', function () {
    return view('some');
});

Route::get('articles', 'App\Http\Controllers\ArticleController@index')->name('articles.index');

Route::get('articles/create', 'App\Http\Controllers\ArticleController@create')->name('articles.create');

Route::post('articles', 'App\Http\Controllers\ArticleController@store')->name('articles.store');

Route::delete('articles/{id}', 'App\Http\Controllers\ArticleController@destroy')->name('articles.destroy');

Route::get('articles/{id}', 'App\Http\Controllers\ArticleController@show')->name('articles.show');

Route::get('articles/{id}/edit', 'App\Http\Controllers\ArticleController@edit')->name('articles.edit');

Route::patch('articles/{id}', 'App\Http\Controllers\ArticleController@update')->name('articles.update');

