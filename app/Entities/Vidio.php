<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Vidio extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'vidios';

    protected $fillable = [
        'name','category_id','photo','intro','content','code'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vidioCategory(){
        return $this->hasOne('App\Entities\Category', 'id', 'category_id');
    }
}
