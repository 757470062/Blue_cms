<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TagModuleRepository;
use App\Entities\TagModule;
use App\Validators\TagModuleValidator;

/**
 * Class TagModuleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TagModuleRepositoryEloquent extends BaseRepository implements TagModuleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TagModule::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
