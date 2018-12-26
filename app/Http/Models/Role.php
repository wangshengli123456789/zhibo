<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/11
 * Time: 19:35
 */

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
class Role{
    //显示
    public function index(){
        $list=DB::table('zb_role')->get();
        return $list;
    }
    //添加
    public function insert($data){
        $list=DB::table('zb_role')->insert($data);
        return $list;
    }
    //删除
    public function delete($r_id){
        $list=DB::table('zd_role')->delete($r_id);
        return $list;
    }
    //批量删除
    public function deletes($r_id){
        $list=DB::table('zb_role')->where('id',$r_id)->delete();
        return $list;
    }

    public function updateadd($id){
        $res = DB::table('zb_role')->where('id',$id)->first();
        return $res;
    }

    public static function update($id,$data){
        $res = DB::table('zb_role')->where('id',$id)->update($data);
        return $res;
    }
}