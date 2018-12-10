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
//直播作品的修改 typeUpdate
Route::any('typeUpdate/{id}',['uses'=>"ZbtypeController@typeUpdate"]);
//直播类型的状态改变
Route::any('updatetypestatus',['uses'=>"ZbtypeController@updatetypestatus"]);
//显示轮播图的页面
Route::any('nav',['uses'=>"NavController@nav"]);
//轮播图管理
Route::any('navadd',['uses'=>"NavController@navadd"]);
//删除轮播图
Route::any('navdel/{id}',['uses'=>"NavController@navdel"]);
//轮播图的批量删除
Route::any('navdelall',['uses'=>"NavController@navdelall"]);
//轮播图的修改
Route::any('navpdate/{id}',['uses'=>"NavController@navupdate"]);
//轮播图状态的修改
Route::any('updatestatus',['uses'=>"NavController@updatestatus"]);
//系统设置界面的显示
Route::any('system',['uses'=>"SystemController@systemindex"]);
//导航栏的显示
Route::any('privieges',['uses'=>"PriviegesController@priIndex"]);
Route::any('priadd',['uses'=>"PriviegesController@priInsertType"]);
Route::any('pridel/{id}',['uses'=>"PriviegesController@typeDelete"]);
Route::any('pridelall',['uses'=>"PriviegesController@priTypeDelete"]);
Route::any('priupdate/{id}',['uses'=>"PriviegesController@typeUpdate"]);
Route::any('priupdatestatus',['uses'=>"PriviegesController@priupdatestatus"]);
//用户管理
//显示用户
Route::any('adminindex',['uses'=>"AdminloginController@index"]);
//添加跳转
Route::any('admininsertadd',['uses'=>"AdminloginController@insertadd"]);
//执行添加
Route::any('admininset',['uses'=>"AdminloginController@insert"]);
//执行删除
Route::any('admindeletes',['uses'=>"AdminloginController@admindeletes"]);
Route::any('admindelete/{id}',['uses'=>"AdminloginController@delete"]);
//跳转修改
Route::any('adminupdateadd/{id}',['uses'=>"AdminloginController@updateadd"]);
//执行修改
Route::any('adminupdate',['uses'=>"AdminloginController@update"]);