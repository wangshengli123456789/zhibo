<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/7
 * Time: 15:04
 */

namespace App\Http\Controllers;

use App\Http\Models\Login;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Session;
use app\http\Models\Role;
class RoleController extends Controller {

    public function Role(){
        $info=Role::role_index();
        dd($info);die;
        return view('role/index',['info'=>$info]);
    }

    //角色管理添加
    public function add(Request $request){
        $data=\request()->all();
        unset($data['_token']);
        $info=Role::insert($data);
        if ($info){
            return redirect('roleindex');
        }
    }
    //角色管理删除
    public function del(){
        $id=$_GET['id'];
        $info=Role::where('id',$id)->delete();
        return redirect('roleindex');
    }
    //角色管理添修改
    public function upd(){
        if (\request()->isMethod('post')){
            $id=$_GET['id'];
            $data=\request()->all();
            unset($data['_token']);
            $info=Role::where('id',$id)->update($data);
            if ($info){
                return redirect('roleindex');
            }else{
                return redirect('upd');
            }
        }else{
            $id=$_GET['id'];
            $info=Role::where('id',$id)->all();
            return view('role.upd',['info'=>$info]);
        }

    }
}