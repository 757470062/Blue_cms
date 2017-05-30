<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TagModule extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'tag_modules';

    protected $fillable = [];

}
