<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:30
 */

namespace App\Http\Controllers;

use App\Http\Models\Privilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PrivilegeController extends Controller
{
    //显示数据123123
    public function index(){
        $model = new Privilege();
        $list = $model->index();
        return view('privilege/index',['list'=>$list]);
    }
    //跳转添加
    public function insertadd(){
        return view('privilege/insert');
    }
    //执行添加
    public function insert(Request $request){
        $info = new Privilege();
        $res = $request->all();
        $list = DB::table('zb_privilege')->where('p_name',$res['p_name'])->first();
        if(empty($list)){
            $up =[
                'p_name' => $res['p_name'],
                'create_time' => $res['create_time']
            ];
            $info->insert($up);
            return redirect('privilegeindex');
        }else{
            echo "权限名已存在，请重新输入！！";
        }

    }
    //删除
    public function delete($id){
        $model = new Privilege();
        $list = $model->delete($id);
        return redirect('privilegeindex');
    }
    //批量删除
    public function privilegedeletes(){
        $str = request()->only('p_id');
        $id = $str['p_id'];
        //调用模型进行批量删除
        $model = new Privilege();
        $res = $model->deletes($id);
        if ($res){
            return redirect('privilegeindex');
        }
    }
    //跳转修改
    public function updateadd($id){
        $model = new Privilege();
        $assign['info'] = $model->updateadd($id);
        return view('privilege/update',$assign);
    }
    //执行修改
    public function update(Request $request){
        $model = new Privilege();
        $res = $request->all();
        $list = DB::table('zb_privilege')->where('p_name',$res['p_name'])->first();
        if(empty($list)){
            $data =[
                'p_name' => $res['p_name'],
                'create_time' => $res['create_time']
            ];
            $id = $res['p_id'];
            $list = $model->update($id,$data);
            return redirect('privilegeindex');
        }else{
            echo "权限名已存在，请重新输入！！";
        }
    }
}