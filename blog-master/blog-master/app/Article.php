<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/16
 * Time: 12:27
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='article';
    protected $primaryKey='id';
    public $timestamps = true;
//    指定语序批量赋值的数据
    protected  $fillable=['content','title'];
    protected  function getDateFormat()
    {
        return time();
    }                       //使用这个时间戳是会报错的。。。暂未解决

    protected function asDateTime($val){
        return $val;
    }

    public function user() {
        return $this->hasOne("App\Blog","id", "user_id");
    }

}