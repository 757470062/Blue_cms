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
}
