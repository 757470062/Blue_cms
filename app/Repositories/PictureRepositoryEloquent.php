<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PictureRepository;
use App\Entities\Picture;
use App\Validators\PictureValidator;

/**
 * Class PictureRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PictureRepositoryEloquent extends BaseRepository implements PictureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Picture::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //$this->pushCriteria(app(RequestCriteria::class));
    }
}
