<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Picture extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'pictures';

    protected $fillable = [
        'name','category_id','photo','content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pictureCategory(){
        return $this->hasOne('App\Entities\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picturePictureTag(){
        return $this->hasMany('App\Entities\PictureTag', 'picture_id', 'id');
    }

    public function picturePictureSource(){
        return $this->hasMany('App\Entities\PictureSource', 'picture_id', 'id');
    }
}
