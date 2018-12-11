<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:30
 */

namespace App\Http\Controllers;


use App\Http\Models\Adminlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminloginController extends Controller
{
    //显示数据
    public function index(){
        $model = new Adminlogin();
        $list = $model->index();
        return view('admin/index',['list'=>$list]);
    }
    //跳转添加
    public function insertadd(){
        return view('admin/insert');
    }
    //执行添加
    public function insert(Request $request){
        $info = new Adminlogin();
        $res = $request->all();
        $list = DB::table('zb_admin_login')->where('name',$res['name'])->first();
        if(empty($list)){
            $up =[
                'name' => $res['name'],
                'pwd' => $res['pwd'],
                'create_time' => $res['create_time']
            ];
            $info->insert($up);
            return redirect('adminindex');
        }else{
            echo "用户名已存在，请重新输入！！";
        }
    }
    //删除
    public function delete($id){
        $model = new Adminlogin();
        $list = $model->delete($id);
        return redirect('adminindex');
    }
    //批量删除
    public function admindeletes(){
        $str = request()->only('id');
        $id = $str['id'];
        //调用模型进行批量删除
        $model = new Adminlogin();
        $res = $model->deletes($id);
        if ($res){
            return redirect('adminindex');
        }
    }
    //跳转修改
    public function updateadd($id){
        $model = new Adminlogin();
        $assign['info'] = $model->updateadd($id);
        return view('admin/update',$assign);
    }
    //执行修改
    public function update(Request $request){
        $model = new Adminlogin();
        $res = $request->all();
        $list = DB::table('zb_admin_login')->where('name',$res['name'])->first();
        if(empty($list)){
            $data =[
                'name' => $res['name'],
                'pwd' => $res['pwd'],
                'create_time' => $res['create_time']
            ];
            $id = $res['id'];
            $list = $model->update($id,$data);
            return redirect('adminindex');
        }else{
            echo "用户名已存在，请重新输入！！";
        }
    }
}