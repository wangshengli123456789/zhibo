<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:30
 */

namespace App\Http\Controllers;


use App\Http\Models\Login;
use App\Http\Requests\Request;

class LoginController extends Controller
{
    public function login()
    {
        //接收提交过来的信息
        if (request()->isMethod('post')){
            $data = request()->only('username','pwd');
            //查询登录信息
            $res = Login::loginAdmin($data);
            print_r($res);die;
        }else{
            return view('login/login');
        }

    }
}