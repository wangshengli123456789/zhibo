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
//登录
Route::any('/',['uses'=>"LoginController@login"]);
//显示页面
Route::any('index',['uses'=>"LoginController@index"]);
//退出 exits
Route::any('exit',['uses'=>"LoginController@exits"]);