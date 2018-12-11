<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/11
 * Time: 16:59
 */

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
class Contact
{
    /*
     * 查询轮播的数据
     */
    public static function navRead()
    {
        $res = DB::table('zb_contact_us')->paginate(5);
        return $res;
    }

    /**
     * 轮播图的新增
     */
    public static function navInsert($data)
    {
        $info=array(
            'content'=>$data['content'],
            'gzh'=>$data['gzh'],
            'sort'=>$data['sort'],
            'prompt'=>$data['prompt'],
            'create_time'=>$data['create_time'],
        );
        $file = $data['code'];
        $ext = $file->getClientOriginalExtension();//获取图片的后缀名
        $filename = uniqid().rand(1000,9999).'.'.$ext;
        $file->move('./navupload/',$filename);
        $info['code'] ='http://'.$_SERVER['SERVER_NAME'].'/navupload/'.$filename;
        //添加数据到数据库
        $res = DB::table('zb_contact_us')->insert($info);
        return $res;
    }
    /**
     * 轮播图的删除
     */
    public static function navdelete($id)
    {
        $res = DB::table('zb_contact_us')->delete($id);
        return $res;
    }
    public static function navdeletes($id)
    {
        $res = DB::table('zb_contact_us')->whereIn('id',$id)->delete();
        return $res;
    }
    /*
     * 轮播图状态的改变
     */
    public static function navstatus($data)
    {
        if ($data['status']=='0'){
            $res = DB::table('zb_contact_us')->where('id',$data['id'])->increment('status','1');
        }else{
            $res = DB::table('zb_contact_us')->where('id',$data['id'])->decrement('status','1');
        }
        return $res;
    }
    /*
     * 单条查询信息
     */
    public static function navselect($id)
    {
        $res = DB::table('zb_contact_us')->where('id',$id)->first();
        return $res;
    }
    /*
     * 轮播图的修改
     */
    public static function navsave($data,$id)
    {
        $res = DB::table('zb_contact_us')->where('id',$id)->update($data);
        return $res;
    }
    /**
     * 搜索信息
     */
    public static function typeSelect($data)
    {
        $res = DB::table('zb_contact_us')->where('gzh','like','%'.$data.'%')->paginate(5);
        return $res;
    }
}