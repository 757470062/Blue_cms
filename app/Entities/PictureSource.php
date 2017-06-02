<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PictureSource extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'picture_id','name','src'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pictureSourcePicture(){
        return $this->hasOne('App\Entities\Picture', 'id', 'picture_id');
    }
}
