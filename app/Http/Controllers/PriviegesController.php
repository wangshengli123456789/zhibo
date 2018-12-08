<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/8
 * Time: 16:02
 */

namespace App\Http\Controllers;


class PriviegesController extends Controller
{
    /*
     * 显示导航显示的页面
     */
    public function priIndex()
    {
        return view('privieges/index');
    }
}