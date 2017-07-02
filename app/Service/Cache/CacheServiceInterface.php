<?php
/**
 * Cache 统一管理
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
     * @param array $relation
     * @return mixed
     */
    public function all($model, $relation = array());

    /**缓存分页
     * @param $data
     * @param string $key
     * @param string $page
     * @return mixed
     */
    public function paginate($data, $key, $page = '1');


    /**
     * 清除导入Model的缓存
     * @param $model
     * @param array $allowed_add
     * @return mixed
     */
    public function forget($model, $allowed_add = array());

}