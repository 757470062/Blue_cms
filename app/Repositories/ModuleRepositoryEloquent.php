<?php

namespace App\Repositories;

use App\Presenters\ModulePresenter;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ModuleRepository;
use App\Entities\Module;
use App\Validators\ModuleValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ModuleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ModuleRepositoryEloquent extends BaseRepository implements ModuleRepository,CacheableInterface
{
    use CacheableRepository;


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
