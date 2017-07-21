<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Friend extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    public $table = 'friends';

    protected $fillable = [
        'name', 'content', 'link', 'photo', 'state', 'sort'
    ];

    protected $dates = ['deleted_at'];

}
