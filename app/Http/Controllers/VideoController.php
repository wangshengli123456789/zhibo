<?php
/**
 * Created by PhpStorm.
 * User: 利宝宝
 * Date: 2018/12/26
 * Time: 8:50
 */

namespace App\Http\Controllers;


use App\Http\Models\Login;
use App\Http\Models\Video;
use App\Http\Controllers\QiniuController;
class VideoController extends Controller
{
    /*
     * 显示轮播图的页面
     */
    public function nav()
    {
        //查询数据
        $res = Video::navRead();
        return view('video/index',['list'=>$res]);
    }
    /*
     * 轮播图的新增页面
     */
    public function navadd()
    {
        if (request()->isMethod('post')){
            $data = request()->only('nav_type','nav_name','nav_url','sort','create_time','picture');
            $info=array(
                'nav_name'=>$data['nav_name'],
                'nav_url'=>$data['nav_url'],
                'sort'=>$data['sort'],
                'create_time'=>$data['create_time'],
            );
            //七牛云上传
            $video = $data['nav_url'];
            $exts = $video->getClientOriginalExtension();//获取图片的后缀名
            $filenames = uniqid().rand(1000,9999).'.'.$exts;
            QiniuController::qiniu_upload($filenames);
            $info['nav_url'] ='http://'.$_SERVER['SERVER_NAME'].'/navupload/'.$filenames;
            $file = $data['picture'];
            $ext = $file->getClientOriginalExtension();//获取图片的后缀名
            $filename = uniqid().rand(1000,9999).'.'.$ext;
            $file->move('./navupload/',$filename);
            $info['nav_picture'] ='http://'.$_SERVER['SERVER_NAME'].'/navupload/'.$filename;
            $res = Video::navInsert($data);
            if ($res){
                return redirect('video');
            }
        }else{
            $res = Login::protype();
            return view('video/insert',['list'=>$res]);
        }
    }
    /*
     * 轮播图的删除
     */
    public function navdel($id)
    {
        $res = Video::navdelete($id);
        if ($res){
            return redirect('video');
        }
    }
    /*
     * 轮播图的批量删除
     */
    public function navdelall()
    {
        $id = request()->only('id');
        $res = Video::navdelete($id);
        if ($res){
            return redirect('video');
        }
    }
    /*
     * 轮播图数据的修改
     */
    public function navupdate($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('nav_name','nav_url','sort','create_time');
            if (request()->hasFile('picture'))
            {
                $file = request()->file('picture');
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./navupload/',$filename);
                $data['nav_picture']='http://'.$_SERVER['SERVER_NAME'].'/navupload/'.$filename;
            }
            //调用方法修改
            $res = Video::navsave($data,$id);
            if ($res){
                return redirect('video');
            }
        }else{
            $res = Nav::navselect($id);
            return view('video/update',['data'=>$res]);
        }
    }
    /*
     * 轮播图状态的修改
     */
    public function updatestatus()
    {
        $id = request()->only('id','status');
        $res = Video::navstatus($id);
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
            $res = Video::navRead();
        }else{
            $res = Video::typeSelect($data['keywords']);
        }

        return view('video/index',['list'=>$res]);
    }
}