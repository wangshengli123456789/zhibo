<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/7
 * Time: 15:27
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Video
{
    /*
     * 查询轮播的数据
     */
    public static function navRead()
    {
        $res = DB::table('zb_video')
            ->join('zb_type','zb_video.nav_type','=','zb_type.id')
            ->paginate(5);
        return $res;
    }

    /**
     * 轮播图的新增
     */
    public static function navInsert($info)
    {
        //添加数据到数据库
        $res = DB::table('zb_video')->insert($info);
        return $res;
    }
    /**
     * 轮播图的删除
     */
    public static function navdelete($id)
    {
        $res = DB::table('zb_video')->delete($id);
        return $res;
    }
    public static function navdeletes($id)
    {
        $res = DB::table('zb_video')->whereIn('id',$id)->delete();
        return $res;
    }
    /*
     * 轮播图状态的改变
     */
    public static function navstatus($data)
    {
        if ($data['status']=='0'){
            $res = DB::table('zb_video')->where('id',$data['id'])->increment('status','1');
        }else{
            $res = DB::table('zb_video')->where('id',$data['id'])->decrement('status','1');
        }
        return $res;
    }
    /*
     * 单条查询信息
     */
    public static function navselect($id)
    {
        $res = DB::table('zb_video')->where('id',$id)->first();
        return $res;
    }
    /*
     * 轮播图的修改
     */
    public static function navsave($data,$id)
    {
        $res = DB::table('zb_video')->where('id',$id)->update($data);
        return $res;
    }
    /**
     * 搜索信息
     */
    public static function typeSelect($data)
    {
        $res = DB::table('zb_video')->join('zb_type','zb_video.nav_type','=','zb_type.id')->where('nav_name','like','%'.$data.'%')->paginate(5);
        return $res;
    }
}