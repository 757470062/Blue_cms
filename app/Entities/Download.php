<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Download extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'downloads';

    protected $fillable = [
        'name','category_id','type','size','from','sky_drive_name','sky_drive_src','sky_drive_psw','content','src','photo','state','sort'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function downloadCategory(){
        return $this->hasOne('App\Entities\Category', 'id', 'category_id');
    }
}
