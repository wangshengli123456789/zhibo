<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/8
 * Time: 16:02
 */

namespace App\Http\Controllers;


use App\Http\Models\Privieges;

class PriviegesController extends Controller
{
    /*
     * 显示导航显示的页面
     */
    public function priIndex()
    {
        $res =Privieges::protype();
        return view('privieges/index',['list'=>$res]);
    }
    /**
     * 导航的添加
     */
    public function priInsertType()
    {
        if (request()->isMethod('post')){
            $data=\request()->only('pid','pri_name','sort','create_time');
            //调用模型添加分类数据
            $res = Privieges::typeAdd($data);
            if ($res){
                return redirect('privieges');
            }
        }else{
            $res = Privieges::protype();
            return view('privieges/insert',['list'=>$res]);
        }
    }
    /**
     * 导航栏的批量删除
     */
    public function priTypeDelete()
    {
        $str = request()->only('id');
        $data = $str['id'];
        //调用模型进行删除
        $res = Privieges::deleteTypes($data);
        if ($res){
            return redirect('privieges');
        }
    }
    /**
     * 修改导航栏分类的信息
     */
    public function typeUpdate($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('pid','pri_name','sort','create_time');
            $res = Privieges::typeUpdate($id,$data);
            if ($res){
                return redirect('privieges');
            }
        }else{
            //显示修改页面
            //根据id查询修改的信息
            $data = Privieges::typeUpdateRead($id);
            $res = Privieges::protype();
            return view('privieges/update',['list'=>$res,'data'=>$id,'info'=>$data]);
        }
    }
    /**
     *删除的操作
     */
    public function typeDelete($id)
    {
        $res = Privieges::deleteType($id);
        if ($res){
            return redirect('privieges');
        }
    }
    /*
     * 分类状态的修改
     */
    public function priupdatestatus()
    {
        $id = request()->only('id','status');
        $res = Privieges::updatestatus($id);
        if ($res){
            return $res;
        }
    }
}