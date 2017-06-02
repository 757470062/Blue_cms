<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PictureSourceRepository;
use App\Entities\PictureSource;
use App\Validators\PictureSourceValidator;

/**
 * Class PictureSourceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PictureSourceRepositoryEloquent extends BaseRepository implements PictureSourceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PictureSource::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
