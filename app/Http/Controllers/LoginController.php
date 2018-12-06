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
        date_default_timezone_set('Asia/shanghai');
        $array=array(
            'server'=>$_SERVER['SystemRoot'],
            'apache'=>$_SERVER['SERVER_SOFTWARE'],
            'addrname'=>$_SERVER['SERVER_ADDR'],
            'host'=>$_SERVER['REMOTE_ADDR'],
            'name'=>$_SERVER['SERVER_NAME'],
            'create_time'=>date('Y-m-d H:i:s')
        );
        return view('login/index',['data'=>$array]);
    }
    /**
     * 直播分类的管理
     */
    public function design()
    {
        $res = Login::protype();
        return view('login/design',['list'=>$res]);
    }
    /**
     * 直播分类的添加
     */
    public function zbInsertType()
    {
        if (request()->isMethod('post')){
            $data=\request()->only('pid','zb_name','sort','create_time');
            //调用模型添加分类数据
            $res = Login::typeAdd($data);
            if ($res){
                return redirect('design');
            }
        }else{
            $res = Login::protype();
            return view('login/insert',['list'=>$res]);
        }
    }
    /**
     * 直播作品分类的批量删除
     */
    public function zcTypeDelete()
    {
        $str = \request()->only('id');
        $new_str = $str['id'];
        $id = rtrim($str,',');
        print_r($str);
    }
    /**
     *
     */
    public function typeDelete($id)
    {
        $res = Login::deleteType($id);
        if ($res){
            return redirect('design');
        }
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