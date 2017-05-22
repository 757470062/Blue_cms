<?php

namespace App\Models;

use Nestable\NestableTrait;

class Category extends \Eloquent
{
    use NestableTrait;

    protected $parent = 'parent_id';

    protected $fillable=[
        'parent_id','name','module_id','seo_title','keys','type','sort','intro'
    ];

    /**
     * @return mixed
     */
    public function categoryModule(){
        return $this->hasOne('App\Models\Module','id','module_id');
    }

}
