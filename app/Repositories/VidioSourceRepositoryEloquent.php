<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VidioSourceRepository;
use App\Entities\VidioSource;
use App\Validators\VidioSourceValidator;

/**
 * Class VidioSourceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VidioSourceRepositoryEloquent extends BaseRepository implements VidioSourceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VidioSource::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //$this->pushCriteria(app(RequestCriteria::class));
    }
}
