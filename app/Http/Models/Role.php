<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/7
 * Time: 15:05
 */

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
class Role{

    public static function role_index(){
        $role=DB::table('role')->get();
        return $role;
    }

    public $table="zb_role";
}