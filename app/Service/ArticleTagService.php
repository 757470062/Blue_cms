<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/14
 * Time: 16:26
 */

namespace App\Service;


use App\Repositories\ArticleTagRepository;

class ArticleTagService
{

    /**
     * ArticleTagService constructor.
     * @param ArticleRepository $repository
     */
    public function __construct(ArticleTagRepository $repository)
    {
        $this->repository = $repository;
    }

}