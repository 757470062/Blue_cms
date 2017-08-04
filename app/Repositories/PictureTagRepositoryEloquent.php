<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PictureTagRepository;
use App\Entities\PictureTag;
use App\Validators\PictureTagValidator;

/**
 * Class PictureTagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PictureTagRepositoryEloquent extends BaseRepository implements PictureTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PictureTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //$this->pushCriteria(app(RequestCriteria::class));
    }
}
