<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/5
 * Time: 16:40
 */

namespace App\Facades\ArticleFacade;


class ArticleFacade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ArticleRepository';
    }

}