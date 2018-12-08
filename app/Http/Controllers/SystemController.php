<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/8
 * Time: 14:10
 */

namespace App\Http\Controllers;


class SystemController extends Controller
{
    public function systemindex()
    {
        return view('login/system');
    }
}