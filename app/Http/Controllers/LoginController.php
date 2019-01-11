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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * 显示登录界面以及登录的验证
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|\think\response\Redirect|\think\response\View
     *
     */
    public function login()
    {
        //接收提交过来的信息
        if (request()->isMethod('post')){
            $data = request()->only('username','pwd');
            //查询登录信息
            $res = Login::loginAdmin($data);
            if ($res['stu']==100){
                //将登陆信息写入日志文件中
                $array=array(
                    'username'=>$data['username'],
                    'host'=>$_SERVER['REMOTE_ADDR'],
                    'login_time'=>time(),
                );
                Session::put('date',$array['login_time']);
                DB::table('zb_login_log')->insert($array);
                return redirect('index');
            }else{
                echo "<script>alert('账号或者密码错误');history.back(-1)</script>";
            }
        }else{
            return view('login/login');
        }
    }

    /**
     * 显示登陆之后的页面
     */
    public function index()
    {
        $array=array(
            'apache'=>$_SERVER['SERVER_SOFTWARE'],
            'addrname'=>$_SERVER['SERVER_ADDR'],
            'host'=>$_SERVER['REMOTE_ADDR'],
            'name'=>$_SERVER['SERVER_NAME'],
            'create_time'=>date('Y-m-d H:i:s',Session::get('date')),
            'dbcontent'=>$_SERVER['DB_CONNECTION'],
            'dbport'=>$_SERVER['DB_PORT'],
            'database'=>$_SERVER['DB_DATABASE'],
            'filesize'=>ini_get('upload_max_filesize'),
        );
        return view('login/index',['data'=>$array]);
    }
    /**
     * 退出系统
     */
    public function exits()
    {
        Session::flush();
        return redirect('/');
    }
}