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

Route::get('post/create', 'PostController@create');
Route::post('post/save', 'PostController@save');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/html', function () {
    return view('html');
});

Route::get('/my', function(){
    return view('my', ['name'=>'jinjiangtao', 'data'=>['this'=>'data', 'yew'=>'do it']]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user', 'HomeController@user')->middleware('auth:api')->name('user');
//Route::get('/user', 'HomeController@user')->name('user');

Route::get('/test','HomeController@test');

Route::get('/authtest', function () {

    $query = http_build_query([
        'client_id' => '3',
        'client_secret'=>'Kq2hiNQU0yjRK874JYTrO5DYUS0xcDSt2GtcLFkI',
        'redirect_uri' => 'http://test.oauth.com/oauth/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    $query =  'http://test.lblog.com/oauth/authorize?'.$query;
    return $query;

    return redirect('http://test.lblog.com/oauth/authorize?'.$query);
})->name('authtest');

Route::get('/oauth/callback', 'ClientController@callback');











