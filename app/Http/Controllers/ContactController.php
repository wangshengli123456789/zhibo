<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/11
 * Time: 16:58
 */

namespace App\Http\Controllers;

use App\Http\Models\Contact;
class ContactController
{
    /*
        * 显示轮播图的页面
        */
    public function nav()
    {
        //查询数据
        $res = Contact::navRead();
        return view('contact/index',['list'=>$res]);
    }
    /*
     * 轮播图的新增页面
     */
    public function navadd()
    {
        if (request()->isMethod('post')){
            $data = request()->only('content','gzh','code','sort','create_time','prompt');
            $res = Contact::navInsert($data);
            if ($res){
                return redirect('contact');
            }
        }else{
            return view('contact/insert');
        }
    }
    /*
     * 轮播图的删除
     */
    public function navdel($id)
    {
        $res = Contact::navdelete($id);
        if ($res){
            return redirect('contact');
        }
    }
    /*
     * 轮播图的批量删除
     */
    public function navdelall()
    {
        $id = request()->only('id');
        $res = Contact::navdelete($id);
        if ($res){
            return redirect('contact');
        }
    }
    /*
     * 轮播图数据的修改
     */
    public function navupdate($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('content','gzh','sort','create_time','prompt');
            if (request()->hasFile('code'))
            {
                $file = request()->file('code');
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./navupload/',$filename);
                $data['code']='http://'.$_SERVER['SERVER_NAME'].'/navupload/'.$filename;
            }
            //调用方法修改
            $res = Contact::navsave($data,$id);
            if ($res){
                return redirect('contact');
            }
        }else{
            $res = Contact::navselect($id);
            return view('contact/update',['data'=>$res]);
        }
    }
    /*
     * 轮播图状态的修改
     */
    public function updatestatus()
    {
        $id = request()->only('id','status');
        $res = Contact::navstatus($id);
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
            return redirect('contact');
        }else{
            $res = Contact::typeSelect($data['keywords']);
        }

        return view('contact/index',['list'=>$res]);
    }
}