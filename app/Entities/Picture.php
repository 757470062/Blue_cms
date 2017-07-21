<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Picture extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    public $table = 'pictures';

    protected $fillable = [
        'name','category_id','photo','content'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pictureCategory(){
        return $this->hasOne('App\Entities\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picturePictureTag(){
        return $this->hasMany('App\Entities\PictureTag', 'picture_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picturePictureSource(){
        return $this->hasMany('App\Entities\PictureSource', 'picture_id', 'id');
    }

    /**
     * 关键词检索数据
     * @param $key
     * @return mixed
     */
    public function search($key){
        return Picture::where('name', 'like', '%'.$key.'%')
            ->orWhere('content', 'like', '%'.$key.'%');
    }
}
