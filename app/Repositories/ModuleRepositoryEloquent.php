<?php

namespace App\Repositories;

use App\Presenters\ModulePresenter;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ModuleRepository;
use App\Entities\Module;
use Facades\App\Repositories\CategoryRepository;

/**
 * Class ModuleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ModuleRepositoryEloquent extends BaseRepository implements ModuleRepository
{


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Module::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
