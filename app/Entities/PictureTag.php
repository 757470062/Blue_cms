<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PictureTag extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'picture_tags';

    protected $fillable = [
        'tag_id','picture_id'
    ];

}
