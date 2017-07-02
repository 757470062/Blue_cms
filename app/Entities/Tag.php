<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tag extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'tags';

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagArticleTag(){
        return $this->hasMany('App\Entities\ArticleTag', 'tag_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagPictureTag(){
        return $this->hasMany('App\Entities\PictureTag', 'tag_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagDownloadTag(){
        return $this->hasMany('App\Entities\DownloadTag', 'tag_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagVidioTag(){
        return $this->hasMany('App\Entities\VidioTag', 'tag_id', 'id');
    }
}
