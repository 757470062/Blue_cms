<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VidioSource extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'vidio_sources';

    protected $fillable = [
        'vidio_id','name','definition','size','src','photo','intro','content','code'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vidioSourceVidio(){
        return $this->hasOne('App\Entities\Vidio', 'id', 'vidio_id');
    }
}
