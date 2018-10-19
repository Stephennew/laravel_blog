<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //允许那些字段可以修改
    protected $fillable = ['title','content'];
}
