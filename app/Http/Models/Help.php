<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/11
 * Time: 14:08
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Help
{
    /**
     * 导航栏的添加（无限极分类）
     */
    public static function protype()
    {
        $data = DB::table('zb_help')->get();
        $res = self::getTree($data);
        return $res;
    }

    /**
     * 无限极分类
     * @param $data
     * @param int $pid
     * @param int $level
     * @return array
     */
    private static function getTree($data,$pid=0,$level=0)
    {
        //定义一个静态的数组
        static $array = array();
        foreach ($data as $k => $v){
            if ($v->pid == $pid){
                $v->level = $level;
                $array[]=$v;
                self::getTree($data,$v->id,$level+1);
            }
        }
        return $array;
    }
    /**
     * 将分类信息添加到数据表中
     */
    public static function typeAdd($data)
    {
        $res = DB::table('zb_help')->insert($data);
        return $res;
    }
    /*
     * 查询该分类是否添加到表中
     */
    public static function typeRead($pid,$name)
    {
        $res = DB::table('zb_help')->where(['pid'=>$pid,'pri_name'=>$name])->first();
        return $res;
    }
    /**
     * 将分类的信息进行删除
     */
    public static function deleteType($id)
    {
        $res = DB::table('zb_help')->delete($id);
        return $res;
    }
    public static function deleteTypes($id)
    {
        $res = DB::table('zb_help')->whereIn('id',$id)->delete();
        return $res;
    }
    /**
     * 修改分类信的查询
     */
    public static function typeUpdateRead($id)
    {
        $res = DB::table('zb_help')->where('id',$id)->first();
        return $res;
    }
    /**
     * 修改分类的信息
     */
    public static function typeUpdate($id,$data)
    {
        $res = DB::table('zb_help')->where('id',$id)->update($data);
        return $res;
    }

    /**
     * 修改状态信息
     * @param $data
     * @return int
     */
    public static function updatestatus($data)
    {
        if ($data['status']=='0'){
            $res = DB::table('zb_help')->where('id',$data['id'])->increment('status','1');
        }else{
            $res = DB::table('zb_help')->where('id',$data['id'])->decrement('status','1');
        }
        return $res;
    }
    /**
     * 搜索信息
     */
    public static function typeSelect($data)
    {
        $res = DB::table('zb_help')->where('pri_name','like','%'.$data.'%')->get();
        $ress = self::getTree($res);
        return $ress;
    }
}