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
        'name','category_id','picture_tag_id','photo','content'
    ];

    public function pictureCategory(){
        return $this->hasOne('App\Entities\Category', 'id', 'category_id');
    }
}
