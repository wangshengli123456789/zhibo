<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:38
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Privilege
{
    //显示zb_privilege
    public function index(){
        $list = DB::table('zb_privilege')->get();
        return $list;
    }
    //添加
    public function insert($data){
        $list = DB::table('zb_privilege')->insert($data);
        return $list;
    }
    //删除
    public function delete($id){
        $list = DB::table('zb_privilege')->where('p_id',$id)->delete();
        return $list;
    }
    //批量删除
    public function deletes($id){
        $list = DB::table('zb_privilege')->where('p_id',$id)->delete();
        return $list;
    }
    //跳转修改
    public function updateadd($id){
        $res = DB::table('zb_privilege')->where('p_id',$id)->first();
        return $res;
    }
    //执行修改
    public static function update($id,$data)
    {
        $res = DB::table('zb_privilege')->where('p_id',$id)->update($data);
        return $res;
    }
}