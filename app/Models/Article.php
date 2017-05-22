<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        'category_id','title','keys','flag_id','clicks','user_id','photo','intro','content','code',
    ];

    public function articleCategory(){
        return $this->hasOne('App\Category','id','category_id');
    }

}
