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
//显示分类的界面
Route::any('design',['uses'=>"ZbtypeController@design"]);
//直播作品分类的新增 zb_insert
Route::any('zb_insert_type',['uses'=>"ZbtypeController@zbInsertType"]);
//直播作品的批量删除
Route::any('zcTypeDelete',['uses'=>"ZbtypeController@zcTypeDelete"]);
Route::any('typeDelete/{id}',['uses'=>"ZbtypeController@typeDelete"]);