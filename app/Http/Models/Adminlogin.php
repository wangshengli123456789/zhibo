<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:38
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Adminlogin
{
    //显示
    public function index(){
        $list = DB::table('zb_admin_login')->get();
        return $list;
    }
    //添加
    public function insert($data){
        $list = DB::table('zb_admin_login')->insert($data);
        return $list;
    }
    //删除
    public function delete($id){
        $list = DB::table('zb_admin_login')->delete($id);
        return $list;
    }
    //批量删除
    public function deletes($id){
        $list = DB::table('zb_admin_login')->where('id',$id)->delete();
        return $list;
    }
    //跳转修改
    public function updateadd($id){
        $res = DB::table('zb_admin_login')->where('id',$id)->first();
        return $res;
    }
    //执行修改
    public static function update($id,$data)
    {
        $res = DB::table('zb_admin_login')->where('id',$id)->update($data);
        return $res;
    }
}