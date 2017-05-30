<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Article extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'articles';

    protected $fillable=[
        'category_id','title','keys','flag_id','clicks','user_id','photo','intro','content','code',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleCategory(){
        return $this->hasOne('App\Entities\Category','id','category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleBackUser(){
        return $this->hasOne('App\Entities\Back\Back' ,'id' ,'user_id');
    }
}
