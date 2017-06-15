<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/14
 * Time: 16:26
 */

namespace App\Service;


use App\Repositories\PictureTagRepository;

class PictureTagService
{

    /**
     * PictureTagService constructor.
     * @param PictureRepository $repository
     */
    public function __construct(PictureTagRepository $repository)
    {
        $this->repository = $repository;
    }
}