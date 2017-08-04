<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FriendRepository;
use App\Entities\Friend;
use App\Validators\FriendValidator;

/**
 * Class FriendRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FriendRepositoryEloquent extends BaseRepository implements FriendRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Friend::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //$this->pushCriteria(app(RequestCriteria::class));
    }
}
