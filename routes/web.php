<?php

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function (){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('user','UserController');
    Route::resource('article','ArticleController');
    Route::resource('pending-article','PendingArticleController');
    Route::get('profile','ProfileController@index')->name('profileIndex');
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth','author']], function (){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::get('/', 'BasicController@home')->name('home');
Route::get('{category}/article/{id}/{title}', 'BasicController@ReadArticle')->name('article');

Route::get('{category}/{id}', 'BasicController@Categories')->name('categories');

Route::get('/sports', 'BasicController@sports')->name('sports');
Route::get('/politics', 'BasicController@politics')->name('politics');
Route::get('/national', 'BasicController@national')->name('national');
Route::get('/trade', 'BasicController@trade')->name('trade');
Route::get('/lifeStyle', 'BasicController@lifeStyle')->name('lifeStyle');
Route::get('/culture', 'BasicController@culture')->name('culture');
Route::get('/education', 'BasicController@education')->name('education');
Route::get('/scienceAndTech', 'BasicController@scienceAndTech')->name('scienceAndTech');
Route::get('/entertainment', 'BasicController@entertainment')->name('entertainment');

Route::post('/article/comment/{id}', 'CommentController@comment')->name('comment');
Route::post('/article/replyComment/{id}', 'CommentController@replyComment')->name('replyComment');


Route::get('/data-search','SearchController@Search')->name('data.search');
