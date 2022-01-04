<?php
// 投稿
Route::post('/post', 'PostController@store');

//フォロー
Route::post('/follow/{user}', 'UserController@follow')->name('user.follow');

//アンフォロー
Route::post('/unfollow/{user}', 'UserController@unfollow')->name('user.unfollow');

//user一覧
Route::get('/users', 'UserController@index');


Route::get('/{any?}','PostController@index');

// Route::get('/posts', 'PostController@index');
// Route::get('/posts/create', 'PostController@create');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{post}/edit', 'PostController@edit');
// Route::put('/posts/{post}', 'PostController@update');
// Route::delete('/posts/{post}', 'PostController@delete');
// Route::get('/posts/{post}', 'PostController@show');