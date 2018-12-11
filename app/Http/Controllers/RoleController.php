<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/11
 * Time: 19:35
 */

namespace App\Http\Controllers;

use App\Http\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller {

    //显示添加的数据
    public function index(){
        $model=new Role();
        $list=$model->index();
        return view('role/index',['list'=>$list]);
    }

    //跳转添加
    public function insertadd(){
        return view('role/insert');
    }

    //添加数据
    public function insert(Request $request){
        $info=new Role();
        $res=$request->all();
        $up=[
            'r_name'=>$res['r_name'],
            'create_time'=>$res['create_time']
        ];
        $info->insert($up);
        return redirect('roleindex');
    }

    //删除
    public function delete($id){
        $model=new Role();
        $list=$model->delete($id);
        return redirect('roleindex');
    }

    //批量删除
    public function roledeletes(){
        $str=request()->only('id');
        $id = $str['id'];

        $model=new Role();
        $res=$model->deletes($id);
        if ($res){
            return redirect('roleindex');
        }
    }


    public function updateadd($id){
        $model=new Role();
        $assign['info']=$model->updateadd($id);
        return view('role/update',$assign);
    }

    //修改
    public function update(Request $request){
        $model=new Role();
        $res=$request->all();
        $data=[
            'name'=>$res['r_name'],
            'create_time'=>$res['create_time']
        ];
        $id = $res['id'];
        $list=$model->update($id,$data);
        return redirect('roleindex');
    }

    //搜索
    public function search(Request $request){
        $res = $request->all();
        $a = $res["r_name"];
        $list = DB::select("select * from  zb_role where r_name like '%$a%'");
        return view('role/add',['list'=>$list]);
    }
}