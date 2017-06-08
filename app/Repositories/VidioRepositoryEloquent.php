<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VidioRepository;
use App\Entities\Vidio;
use App\Validators\VidioValidator;

/**
 * Class VidioRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VidioRepositoryEloquent extends BaseRepository implements VidioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vidio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
