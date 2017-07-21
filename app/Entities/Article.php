<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Article extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    public $table = 'articles';

    protected $fillable=[
        'category_id','title','keys','flag_id','clicks','user_id','photo','intro','content','code',
    ];

    protected $dates = ['deleted_at'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleArticleTag(){
        return $this->hasMany('App\Entities\ArticleTag', 'article_id', 'id');
    }

}
