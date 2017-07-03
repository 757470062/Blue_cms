<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/29
 * Time: 13:56
 */

namespace App\Service\Cache;



use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class CacheService implements CacheServiceInterface
{
    private $enable;
    private $minutes;
    private $clean;
    private $allowed;


    /**
     * CacheService constructor.
     */
    public function __construct()
    {
        $this->enable = Config::get('Service.CacheService.enable');
        $this->minutes = Config::get('Service.CacheService.minutes');
        $this->clean = Config::get('Service.CacheService.clean');
        $this->allowed = Config::get('Service.CacheService.allowed');
    }


    /**
     * 缓存所有内容
     * @param $model
     * @param array $relation
     * @return mixed
     */
    public function all($model, $relation = array())
    {
        if (Cache::has($model->table.'.all')){
           $data = Cache::get($model->table.'.all');
        }else{
            if (empty($relation)){
                $data = $model->orderBy('id', 'desc')->all();
            }else{
                $data = $model->with($relation)->orderBy('id', 'desc')->get();
            }
            Cache::remember($model->table.'.all', $this->minutes, function () use($data){
                return $data;
            });
        }
        return $data;
    }


    /**缓存分页
     * @param $data
     * @param string $key
     * @param string $page
     * @return mixed
     */
    public function paginate($data, $key, $page = '1')
    {
        $key = $key.'.page.'.$page;

        if (Cache::has($key)){
            $data = Cache::get($key);
        }else{
            Cache::remember($key, $this->minutes, function () use($data){
                return $data;
            });
        }
        return $data;
    }


    /**清空该Model缓存
     * @param $model
     * @param array $allowed_add
     */
    public function forget($model, $allowed_add = array())
    {
       foreach ($this->allowed as $k => $v ){
           if($v) {
               Cache::forget($model->table . '.' . $k);
           }
       }
       if (!empty($allowed_add)){
           foreach ($allowed_add as $k => $v ){
               if($v) {
                   Cache::forget($model->table . '.' . $k);
               }
           }
       }
    }

    /**
     * @param bool|mixed $enable
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    /**
     * @param mixed $minutes
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
    }

    /**
     * @param mixed $clean
     */
    public function setClean($clean)
    {
        $this->clean = $clean;
    }

    /**
     * @param mixed $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @return mixed
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * @return mixed
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @return mixed
     */
    public function getClean()
    {
        return $this->clean;
    }

    /**
     * @return mixed
     */
    public function getAllowed()
    {
        return $this->allowed;
    }


}