<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Essays extends Model
{
    //允许那些字段可以修改
    protected $fillable = ['title','content','cateid','author','conver'];
    
    //获取该文章的作者，  一对多反向（反向） essays.cateid=>ArticleCate.id
    public function dsa()
    {
        return $this->belongsTo(ArticleCate::class,'cateid','id');
    }
}
