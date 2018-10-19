<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostCate extends Model
{
    //允许修改哪些字段
    protected $fillable =['cateName'];
    //申明表名
    protected $table = 'post_cate';
}
