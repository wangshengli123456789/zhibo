<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:38
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Login
{
    public static function loginAdmin($data)
    {
        $res = DB::table('zb_admin_login')->where('name',$data['username'])->first();
        if ($res){
            //判断密码是否正确
            if ($res->pwd==$data['pwd']){
                $info['stu'] = '100';
                $info['msg'] = '登录成功';
            }else{
                $info['stu'] = '102';
                $info['msg'] = '用户密码错误';
            }
        }else{
            //用户不存在
            $info['stu'] = '101';
            $info['msg'] = '用户不存在';
        }
        return $info;
    }
}