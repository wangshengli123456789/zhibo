<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/7
 * Time: 8:43
 */

namespace App\Http\Controllers;

use App\Http\Models\Login;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Session;
class ZbtypeController
{
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
        $str = request()->only('id');
        $data = $str['id'];
        //调用模型进行删除
        $res = Login::deleteType($data);
        if ($res){
            return redirect('design');
        }
    }
    /**
     * 修改分类的信息
     */
    public function typeUpdate($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('pid','zb_name','sort','create_time');
            $res = Login::typeUpdate($id,$data);
            if ($res){
                return redirect('design');
            }
        }else{
            //显示修改页面
            //根据id查询修改的信息
            $data = Login::typeUpdateRead($id);
            $res = Login::protype();
            return view('login/update',['list'=>$res,'data'=>$id,'info'=>$data]);
        }
    }
    /**
     *删除的操作
     */
    public function typeDelete($id)
    {
        $res = Login::deleteType($id);
        if ($res){
            return redirect('design');
        }
    }
    /*
     * 分类状态的修改
     */
    public function updatetypestatus()
    {
        $id = request()->only('id','status');
        $res = Login::updatestatus($id);
        if ($res){
            return $res;
        }
    }
}