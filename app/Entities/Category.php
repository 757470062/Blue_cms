<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;
    use NestableTrait;

    public $table = 'categories';

    protected $fillable=[
        'parent_id','name','module_id','seo_title','keys','type','sort','intro'
    ];

    /**
     * @return mixed
     */
    public function categoryModule(){
        return $this->hasOne('App\Entities\Module','id','module_id');
    }
}
