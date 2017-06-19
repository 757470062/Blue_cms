<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/1
 * Time: 10:24
 */

namespace App\Service\Cache\Extend;


use App\Service\Cache\CacheServiceInterface;

interface CategoryCacheServiceInterface extends CacheServiceInterface
{
    /**
     * nestable插件缓存
     * @param $model
     * @return mixed
     */
    public function allCacheByNestable($model);

    /**
     * nestable option风格缓存
     * @param $model
     * @return mixed
     */
    public function allCacheByOption($model);

    /**
     * nestable option风格缓存
     * @param $model
     * @param array $id
     * @return mixed
     */
    public function allCacheByOptionSelected($model, $id = array());
}