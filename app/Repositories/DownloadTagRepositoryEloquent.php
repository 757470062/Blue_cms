<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DownloadTagRepository;
use App\Entities\DownloadTag;
use App\Validators\DownloadTagValidator;

/**
 * Class DownloadTagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DownloadTagRepositoryEloquent extends BaseRepository implements DownloadTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DownloadTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
