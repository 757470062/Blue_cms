<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VidioTag extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'vidio_tags';

    protected $fillable = [
        'tag_id','vidio_id'
    ];
}
