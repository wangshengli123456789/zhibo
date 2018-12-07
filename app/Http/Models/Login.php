<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/12/6
 * Time: 13:38
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Login
{
    /**
     * 后台用户的登录
     * @param $data
     * @return mixed
     */
    public static function loginAdmin($data)
    {
        $res = DB::table('zb_admin_login')->where('name',$data['username'])->first();
        if ($res){
            //判断密码是否正确
            if ($res->pwd==$data['pwd']){
                $info['stu'] = '100';
                $info['msg'] = '登录成功';
            }else{
                $info['stu'] = '102';
                $info['msg'] = '用户密码错误';
            }
        }else{
            //用户不存在
            $info['stu'] = '101';
            $info['msg'] = '用户不存在';
        }
        return $info;
    }

    /**
     * 直播分类的添加（无限极分类）
     */
    public static function protype()
    {
        $data = DB::table('zb_type')->get();
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
        $res = DB::table('zb_type')->insert($data);
        return $res;
    }
    /**
     * 将分类的信息进行删除
     */
    public static function deleteType($id)
    {
        $res = DB::table('zb_type')->delete($id);
        return $res;
    }
    /**
     * 修改分类信的查询
     */
    public static function typeUpdateRead($id)
    {
        $res = DB::table('zb_type')->where('id',$id)->first();
        return $res;
    }
    /**
     * 修改分类的信息
     */
    public static function typeUpdate($id,$data)
    {
        $res = DB::table('zb_type')->where('id',$id)->update($data);
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
            $res = DB::table('zb_type')->where('id',$data['id'])->increment('status','1');
        }else{
            $res = DB::table('zb_type')->where('id',$data['id'])->decrement('status','1');
        }
        return $res;
    }
}