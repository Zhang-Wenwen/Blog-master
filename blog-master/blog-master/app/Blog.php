<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/16
 * Time: 12:27
 */

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps = true;
//    指定语序批量赋值的数据
   protected  $fillable=['content','title'];
    protected  function getDateFormat()
    {
    return time();
    }

    protected function asDateTime($val){
        return $val;
    }

    public function article( ){
        return $this->hasMany('APP\Article',"user_id", "id");
    }


}