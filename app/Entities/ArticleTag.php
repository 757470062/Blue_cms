<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ArticleTag extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'article_tags';

    protected $fillable = [
        'tag_id','article_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleTagTag(){
        return $this->hasOne('App\Entities\Tag','id','tag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleTagArticle(){
        return $this->hasMany('App\Entities\Article', 'id', 'article_id');
    }

}
