<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/29
 * Time: 13:56
 */

namespace App\Service\Cache;



use Illuminate\Support\Facades\Cache;
use League\Flysystem\Config;

class CacheService implements CacheServiceInterface
{
    protected $enable;
    protected $minutes;
    protected $clean;
    protected $allowed;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->enable = $this->config->get('Service.CacheService.enable');
        $this->minutes = $this->config->get('Service.CacheService.minutes');
        $this->clean = $this->config->get('Service.CacheService.clean');
        $this->allowed = $this->config->get('Service.CacheService.allowed');
    }

    /**
     * @param $model
     * @param null $relation
     * @return mixed
     */
    public function all($model, $relation = null)
    {
        if (Cache::has($model->table.'.all')){
           $data = Cache::get($model->table.'.all');
        }else{
            if (empty($relation)){
                $data = $model->all();
            }else{
                $data = $model->with($relation)->get();
            }
            Cache::rememberForever($model->table.'.all', function () use($data){
                return $data;
            });
        }
        return $data;
    }

    public function paginate($model)
    {
        // TODO: Implement paginate() method.
    }

    /**
     * @param bool|mixed $enable
     * @return CacheService
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
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


}