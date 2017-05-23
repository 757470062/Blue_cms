<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        'category_id','title','keys','flag_id','clicks','user_id','photo','intro','content','code',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleBackUser(){
        return $this->hasOne('App\Models\Back\Back' ,'id' ,'user_id');
    }
}
