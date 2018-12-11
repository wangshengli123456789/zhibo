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


//角色管理
//显示角色
Route::any('roleindex',['uses'=>"RoleController@index"]);
//添加跳转
Route::any('roleinsertadd',['uses'=>"RoleController@insertadd"]);
//执行添加
Route::any('roleinset',['uses'=>"RoleController@insert"]);
//执行删除
Route::any('roledeletes',['uses'=>"RoleController@admindeletes"]);
Route::any('roledelete/{id}',['uses'=>"RoleController@delete"]);
//跳转修改
Route::any('roleupdateadd/{id}',['uses'=>"RoleController@updateadd"]);
//执行修改
Route::any('roleupdate',['uses'=>"RoleController@update"]);
//搜索
Route::any('rolesearch',['uses'=>"RoleController@search"]);


//直播类型的状态改变
Route::any('updatetypestatus',['uses'=>"ZbtypeController@updatetypestatus"]);


//直播类型的搜索
Route::any('typesearch',['uses'=>"ZbtypeController@typesearch"]);
//直播分类的下级添加
Route::any('typeadd/{id}',['uses'=>"ZbtypeController@priadd"]);

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
//轮播图的搜索
Route::any('navsearch',['uses'=>"NavController@navsearch"]);
//轮播图状态的修改
Route::any('updatestatus',['uses'=>"NavController@updatestatus"]);
//系统设置界面的显示
Route::any('system',['uses'=>"SystemController@systemindex"]);


//导航栏的显示
Route::any('privieges',['uses'=>"PriviegesController@priIndex"]);
//添加
Route::any('priadd',['uses'=>"PriviegesController@priInsertType"]);
//删除
Route::any('pridel/{id}',['uses'=>"PriviegesController@typeDelete"]);
//批量删除
Route::any('pridelall',['uses'=>"PriviegesController@priTypeDelete"]);
//修改
Route::any('priupdate/{id}',['uses'=>"PriviegesController@typeUpdate"]);
//更改状态
Route::any('priupdatestatus',['uses'=>"PriviegesController@priupdatestatus"]);



//搜索
Route::any('prisearch',['uses'=>"PriviegesController@prisearch"]);
//下级添加分类
Route::any('priadds/{id}',['uses'=>"PriviegesController@priadd"]);
Route::any('priadd/{id}',['uses'=>"PriviegesController@priadd"]);



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
//搜索
Route::any('adminsearch',['uses'=>"AdminloginController@search"]);


//权限管理
//显示权限
Route::any('privilegeindex',['uses'=>"PrivilegeController@index"]);
//添加跳转
Route::any('privilegeinsertadd',['uses'=>"PrivilegeController@insertadd"]);
//执行添加
Route::any('privilegeinset',['uses'=>"PrivilegeController@insert"]);
//执行删除
Route::any('privilegedeletes',['uses'=>"PrivilegeController@privilegedeletes"]);
Route::any('privilegedelete/{id}',['uses'=>"PrivilegeController@delete"]);
//跳转修改
Route::any('privilegeupdateadd/{id}',['uses'=>"PrivilegeController@updateadd"]);
//执行修改
Route::any('privilegeupdate',['uses'=>"PrivilegeController@update"]);
//搜索
Route::any('privilegesearch',['uses'=>"PrivilegeController@search"]);

//帮助中心的增删改查
Route::any('helpindex',['uses'=>"HelpController@helpindex"]);
//添加
Route::any('helpadd',['uses'=>"HelpController@priInsertType"]);
//删除
Route::any('helpdel/{id}',['uses'=>"HelpController@typeDelete"]);
//批量删除
Route::any('helpdelall',['uses'=>"HelpController@priTypeDelete"]);
//修改
Route::any('helpupdate/{id}',['uses'=>"HelpController@typeUpdate"]);
//更改状态
Route::any('helpupdatestatus',['uses'=>"HelpController@priupdatestatus"]);
//搜索
Route::any('helpsearch',['uses'=>"HelpController@prisearch"]);
//下级添加分类
Route::any('helpadds/{id}',['uses'=>"HelpController@priadd"]);

//显示联系我们的页面
Route::any('contact',['uses'=>"ContactController@nav"]);
//联系我们管理
Route::any('conadd',['uses'=>"ContactController@navadd"]);
//删除联系我们
Route::any('condel/{id}',['uses'=>"ContactController@navdel"]);
//联系我们的批量删除
Route::any('condelall',['uses'=>"ContactController@navdelall"]);
//联系我们的修改
Route::any('conpdate/{id}',['uses'=>"ContactController@navupdate"]);
//联系我们的搜索
Route::any('consearch',['uses'=>"ContactController@prisearch"]);
//联系我们状态的修改
Route::any('conupdatestatus',['uses'=>"ContactController@updatestatus"]);