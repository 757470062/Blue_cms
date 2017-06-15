<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/14
 * Time: 10:58
 */

namespace App\Service;


use App\Repositories\DownloadTagRepository;

class DownloadTagService
{

    /**
     * DownloadTagService constructor.
     * @param DownloadTagRepository $repository
     */
    public function __construct(DownloadTagRepository $repository)
    {
        $this->repository = $repository;
    }

}