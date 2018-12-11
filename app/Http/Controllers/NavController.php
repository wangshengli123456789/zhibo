<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/7
 * Time: 15:05
 */

namespace App\Http\Controllers;


use App\Http\Models\Nav;
use Illuminate\Support\Facades\DB;

class NavController extends Controller
{
    /*
     * 显示轮播图的页面
     */
    public function nav()
    {
        //查询数据
        $res = Nav::navRead();
        return view('nav/index',['list'=>$res]);
    }
    /*
     * 轮播图的新增页面
     */
    public function navadd()
    {
        if (request()->isMethod('post')){
            $data = request()->only('nav_name','nav_url','sort','create_time','picture');
            $res = Nav::navInsert($data);
            if ($res){
                return redirect('nav');
            }
        }else{
            return view('nav/insert');
        }
    }
    /*
     * 轮播图的删除
     */
    public function navdel($id)
    {
        $res = Nav::navdelete($id);
        if ($res){
            return redirect('nav');
        }
    }
    /*
     * 轮播图的批量删除
     */
    public function navdelall()
    {
        $id = request()->only('id');
        $res = Nav::navdelete($id);
        if ($res){
            return redirect('nav');
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
            $res = Nav::navsave($data,$id);
            if ($res){
                return redirect('nav');
            }
        }else{
            $res = Nav::navselect($id);
            return view('nav/update',['data'=>$res]);
        }
    }
    /*
     * 轮播图状态的修改
     */
    public function updatestatus()
    {
        $id = request()->only('id','status');
        $res = Nav::navstatus($id);
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
            $res = Nav::protype();
        }else{
            $res = Nav::typeSelect($data['keywords']);
        }

        return view('nav/index',['list'=>$res]);
    }
}