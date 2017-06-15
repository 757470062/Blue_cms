<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/14
 * Time: 16:26
 */

namespace App\Service;


use App\Repositories\VidioTagRepository;

class VidioTagService
{


    /**
     * VidioTagService constructor.
     * @param VidioTagRepository $repository
     */
    public function __construct(VidioTagRepository $repository)
    {
        $this->repository = $repository;
    }

}