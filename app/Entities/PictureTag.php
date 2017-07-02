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

    public function pictureTagTag(){
        return $this->hasOne('App\Entities\Tag', 'id', 'tag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictureTagPicture(){
        return $this->hasMany('App\Entities\Picture', 'id', 'picture_id');
    }
}
