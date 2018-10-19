<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //允许修改的字段
    protected $fillable = ['title','content','postCateid','authorid'];
    //申明表名
    protected $table = 'post';

    ////获取该文章的作者，  一对多反向（反向） essays.cateid=>ArticleCate.id
    public function zuozhe()
    {
        //这里返回的是一个数组
        return $this->belongsTo(User::class,'authorid','id');
    }

    //这里返回的是一个数组，因为表名没有按laravel 的约定，表名是配置的
    public function fenlei()
    {
        return $this->belongsTo(PostCate::class,'postCateid','id');
    }
}
