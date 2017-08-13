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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/chat', 'ChatsController@index'); //for chatting
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

//user
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout'); //for chatting
//admin
Route::get('/conversation/{conversation}/chat', 'ConversationController@chat')->name('conversation.chat'); //for manage admin
Route::post('/conversation', 'ConversationController@store')->name('conversation.store');
Route::get('/conversation', 'ConversationController@index')->name('conversation.manage'); //for manage admin

Route::prefix('admin')->group(function() {
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login'); //for manage admin
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit'); //for manage admin
Route::get('/', 'AdminController@index')->name('admin.dashboard'); //for manage admin
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout'); //for manage admin

Route::get('/conversation/{conversation}/chat', 'AdminController@chat')->name('admin.chat'); //for manage admin
Route::post('/conversation', 'AdminController@converstore')->name('admin.converstore');
Route::get('/conversation', 'AdminController@conversation')->name('admin.conversation'); //for manage admin

//admin manage user
Route::post('/manage', 'AdminController@store')->name('admin.store');
Route::put('/manage/{admin}', 'AdminController@update')->name('admin.update');
Route::delete('/manage/{admin}', 'AdminController@delete')->name('admin.delete');
Route::get('/manage/create', 'AdminController@create')->name('admin.create'); //for manage admin
Route::get('/manage/{admin}/edit', 'AdminController@edit')->name('admin.edit'); //for manage admin
Route::get('/manage/{admin}', 'AdminController@show')->name('admin.show'); //for manage admin
Route::get('/manage', 'AdminController@manage')->name('admin.manage'); //for manage admin
//word
Route::post('/word', 'AdminController@wordStore')->name('admin.wordStore');
Route::get('/word/create', 'AdminController@wordCreate')->name('admin.wordCreate'); //for manage word
Route::put('/word/{word}', 'AdminController@wordUpdate')->name('admin.wordUpdate');
Route::delete('/word/{word}', 'AdminController@wordDelete')->name('admin.wordDelete');
Route::get('/word/{word}', 'AdminController@wordShow')->name('admin.wordShow');
Route::get('/word/{word}/edit', 'AdminController@wordEdit')->name('admin.wordEdit');
Route::get('/word', 'AdminController@word')->name('admin.word'); //for manage word

});

Route::get('/home', 'HomeController@index'); //for manage list chat

//word
// Route::post('/word', 'WordController@store')->name('word.store');
// Route::get('/word/create', 'WordController@create'); //for manage word
// Route::put('/word/{word}', 'WordController@update');
// Route::delete('/word/{word}', 'WordController@delete');
// Route::get('/word/{word}', 'WordController@show');
// Route::get('/word/{word}/edit', 'WordController@edit');
// Route::get('/word', 'WordController@index'); //for manage word
