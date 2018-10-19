<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //允许修改的字段
    protected $fillable = ['name','telphone','email','brithday','card','signature','intro'];
}
