<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/7
 * Time: 15:27
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Nav
{
    /*
     * 查询轮播的数据
     */
    public static function navRead()
    {
        $res = DB::table('zb_nav_picture')->paginate(5);
        return $res;
    }

    /**
     * 轮播图的新增
     */
    public static function navInsert($data)
    {
        $info=array(
        'nav_name'=>$data['nav_name'],
        'nav_url'=>$data['nav_url'],
        'sort'=>$data['sort'],
        'create_time'=>$data['create_time'],
         );
        $file = $data['picture'];
        $ext = $file->getClientOriginalExtension();//获取图片的后缀名
        $filename = uniqid().rand(1000,9999).'.'.$ext;
        $file->move('./navupload/',$filename);
        $info['nav_picture'] ='http://'.$_SERVER['SERVER_NAME'].'/navupload/'.$filename;
        //添加数据到数据库
        $res = DB::table('zb_nav_picture')->insert($info);
        return $res;
    }
    /**
     * 轮播图的删除
     */
    public static function navdelete($id)
    {
        $res = DB::table('zb_nav_picture')->delete($id);
        return $res;
    }
    public static function navdeletes($id)
    {
        $res = DB::table('zb_nav_picture')->whereIn('id',$id)->delete();
        return $res;
    }
    /*
     * 轮播图状态的改变
     */
    public static function navstatus($data)
    {
        if ($data['status']=='0'){
            $res = DB::table('zb_nav_picture')->where('id',$data['id'])->increment('status','1');
        }else{
            $res = DB::table('zb_nav_picture')->where('id',$data['id'])->decrement('status','1');
        }
        return $res;
    }
    /*
     * 单条查询信息
     */
    public static function navselect($id)
    {
        $res = DB::table('zb_nav_picture')->where('id',$id)->first();
        return $res;
    }
    /*
     * 轮播图的修改
     */
    public static function navsave($data,$id)
    {
        $res = DB::table('zb_nav_picture')->where('id',$id)->update($data);
        return $res;
    }
}