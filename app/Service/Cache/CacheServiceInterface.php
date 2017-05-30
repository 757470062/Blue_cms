<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/29
 * Time: 13:56
 */

namespace App\Service\Cache;



interface CacheServiceInterface
{

    /**
     *缓存所有数据
     * @param $model
     * @param $ralation
     * @return mixed
     */
    public function all($model, $ralation = null);

    /**
     * 缓存所有数据到分页
     * @param $model
     * @return mixed
     */
    public function paginate($model);


}