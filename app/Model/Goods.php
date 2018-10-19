<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //允许那些字段可以修改
    protected $fillable = ['goodsname','sn','conver','num'];
}
