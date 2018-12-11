<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/11
 * Time: 14:06
 */

namespace App\Http\Controllers;


use App\Http\Models\Help;

class HelpController extends Controller
{
    /*
         * 显示导航显示的页面
         */
    public function helpindex()
    {
        $res =Help::protype();
        return view('help/index',['list'=>$res]);
    }
    /**
     * 导航的添加
     */
    public function priInsertType()
    {
        if (request()->isMethod('post')){
            $data=\request()->only('pid','pri_name','sort','create_time');
            //调用模型添加分类数据
            $info = Help::typeRead($data['pid'],$data['pri_name']);
            if ($info){
                echo "<script>alert('该分类已存在，请重新添加');history.back(-1);</script>";die;
            }
            $res = Help::typeAdd($data);
            if ($res){
                return redirect('helpindex');
            }
        }else{
            $res = Help::protype();
            return view('help/insert',['list'=>$res]);
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
        $res = Help::deleteTypes($data);
        if ($res){
            return redirect('helpindex');
        }
    }
    /**
     * 修改导航栏分类的信息
     */
    public function typeUpdate($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('pid','pri_name','sort','create_time');
            $info = Help::typeRead($data['pid'],$data['pri_name']);
            if ($info){
                echo "<script>alert('该分类已存在，请重新添加');history.back(-1);</script>";die;
            }
            $res = Help::typeUpdate($id,$data);
            if ($res){
                return redirect('helpindex');
            }
        }else{
            //显示修改页面
            //根据id查询修改的信息
            $data = Help::typeUpdateRead($id);
            $res = Help::protype();
            return view('help/update',['list'=>$res,'data'=>$id,'info'=>$data]);
        }
    }
    /**
     *删除的操作
     */
    public function typeDelete($id)
    {
        $res = Help::deleteType($id);
        if ($res){
            return redirect('helpindex');
        }
    }
    /*
     * 分类状态的修改
     */
    public function priupdatestatus()
    {
        $id = request()->only('id','status');
        $res = Help::updatestatus($id);
        if ($res){
            return $res;
        }
    }
    /**
     * 搜索功能的实现
     */
    public function prisearch()
    {
        $data = \request()->only('keywords');
        if (empty($data['keywords'])){
            $res = Help::protype();
        }else{
            $res = Help::typeSelect($data['keywords']);
        }

        return view('help/index',['list'=>$res]);
    }
    /**
     * 根据上级分类pid来添加数据
     */
    public function priadd($id)
    {
        if (request()->isMethod('post')){
            $data=\request()->only('pri_name','sort','create_time');
            //调用模型添加分类数据
            $info = Help::typeRead($id,$data['pri_name']);
            if ($info){
                echo "<script>alert('该分类已存在，请重新添加');history.back(-1);</script>";die;
            }
            $data['pid'] = $id;
            $res = Help::typeAdd($data);
            if ($res){
                return redirect('helpindex');
            }
        }else{
            return view('help/add');
        }
    }
}