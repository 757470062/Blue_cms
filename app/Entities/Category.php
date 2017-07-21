<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nestable\NestableTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait, NestableTrait, SoftDeletes;

    public $table = 'categories';

    protected $fillable=[
        'parent_id','name','module_id','seo_title','keys','type','sort','intro'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return mixed
     */
    public function categoryModule(){
        return $this->hasOne('App\Entities\Module','id','module_id');
    }
}
