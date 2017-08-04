<?php

namespace App\Repositories;

use Illuminate\Support\Facades\App;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ArticleRepository;
use App\Entities\Article;

/**
 * Class ArticleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    /**
     * @return string
     */
 /*   public function presenter()
    {
        return 'App\\Presenters\\ArticlePresenter';
    }*/

    protected $fieldSearchable = [
        'title' => 'like',
        'intro' => 'like',
        //'article_tags.tag_id' => '=',
    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }

    /**
     * 通过id排序
     * @return mixed
     */
    public function allOrderById(){
        return $this->model()->orderBy('id', 'desc');
   }

    /**
     * 通过点击率(clicks)排序
     * @return mixed
     */
    public function allOrderByClicks(){
        return $this->model()->orderBy('clicks', 'desc');
   }




}
