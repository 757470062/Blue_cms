<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VidioTagRepository;
use App\Entities\VidioTag;
use App\Validators\VidioTagValidator;

/**
 * Class VidioTagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VidioTagRepositoryEloquent extends BaseRepository implements VidioTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VidioTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
