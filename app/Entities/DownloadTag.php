<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DownloadTag extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'download_tags';

    protected $fillable = [
        'tag_id','download_id'
    ];

}
