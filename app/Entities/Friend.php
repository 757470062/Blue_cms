<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Friend extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'friends';

    protected $fillable = [
        'name', 'content', 'link', 'photo', 'state', 'sort'
    ];

}
