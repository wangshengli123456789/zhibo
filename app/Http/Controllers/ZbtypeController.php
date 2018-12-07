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
        $str = \request()->only('id');
        $new_str = $str['id'];
        $id = rtrim($str,',');
        print_r($str);
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
}