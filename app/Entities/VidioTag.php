<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VidioTag extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'vidio_tags';

    protected $fillable = [
        'tag_id','vidio_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vidioTagVidio(){
        return $this->hasMany('App\Entities\Vidio', 'id', 'vidio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vidioTagTag(){
        return $this->hasOne('App\Entities\Tag', 'id', 'tag_id');
    }
}
