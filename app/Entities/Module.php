<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Module extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    public $table = 'modules';

    protected $fillable=[
        'name','list','article','cover',
    ];

    protected $dates = ['deleted_at'];
}
