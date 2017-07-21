<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PictureSource extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    public $table = 'picture_sources';

    protected $fillable = [
        'picture_id','name','src','content'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pictureSourcePicture(){
        return $this->hasOne('App\Entities\Picture', 'id', 'picture_id');
    }
}
