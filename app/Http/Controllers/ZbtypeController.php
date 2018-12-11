<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/7
 * Time: 8:43
 */


/*role*/
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
            //查询该分类是否添加
            $info = Login::typeRead($data['pid'],$data['zb_name']);
            if ($info){
                echo "<script>alert('该分类已存在，请重新添加');history.back(-1);</script>";die;
            }
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
        $res = Login::deleteTypes($data);
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
            $info = Login::typeRead($data['pid'],$data['zb_name']);
            if ($info){
                echo "<script>alert('该分类已存在，请重新添加');history.back(-1);</script>";die;
            }
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
     * echo date('Y-m-d H:i:s',strtotime('-1 day',time()));
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
    /**
     * 搜索功能的实现
     */
    public function typesearch()
    {
        $data = \request()->only('keywords');
        if (empty($data['keywords'])){
            $res = Login::protype();
        }else{
            $res = Login::typeSelect($data['keywords']);
        }

        return view('login/design',['list'=>$res]);
    }
    /**
     * 根据上级分类pid来添加数据
     */
    public function priadd($id)
    {
        if (request()->isMethod('post')){
            $data=\request()->only('zb_name','sort','create_time');
            //调用模型添加分类数据
            $info = Login::typeRead($id,$data['zb_name']);
            if ($info){
                echo "<script>alert('该分类已存在，请重新添加');history.back(-1);</script>";die;
            }
            $data['pid'] = $id;
            $res = Login::typeAdd($data);
            if ($res){
                return redirect('design');
            }
        }else{
            return view('login/add');
        }
    }
}