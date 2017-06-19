<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/30
 * Time: 15:28
 */

namespace App\Service\Cache\Extend;


use App\Service\Cache\CacheService;
use App\Service\Cache\CacheServiceInterface;
use Illuminate\Support\Facades\Cache;

class CategoryCacheService extends CacheService implements CategoryCacheServiceInterface
{

    private $allowed_add = [
        'all.by.nestable' => true,
        'all.by.option' => true
    ];


    /**
     * 生成nestable的json
     * @param $model
     * @return mixed
     */
    public function allCacheByNestable($model){
        if (Cache::has($model->table.'.all.by.nestable')){
            $data = Cache::get($model->table.'.all.by.nestable');
        }else{
            $data = $model->nested()->get();
            Cache::remember($model->table.'.all.by.nestable', $this->getMinutes(), function () use($data){
                return $data;
            });
        }
        return $data;
    }


    /**
     * 利用nestable生成select和option 添加id进行选中
     * @param $model
     * @param array $id   int or array
     * @return mixed
     */
    public function allCacheByOptionSelected($model, $id = array())
    {
        if (Cache::has($model->table.'.all.by.option.'.$id)){
            $data = Cache::get($model->table.'.all.by.option.'.$id);
        }else{
            $data = $model
                ->attr(['name' => 'category_id' ,'class' => 'form-control'])
                ->selected($id)
                ->renderAsDropdown();
            Cache::remember($model->table.'.all.by.option.'.$id, $this->getMinutes(), function () use($data){
                return $data;
            });
        }
        return $data;
    }



    /**
     * 利用nestable生成select和option
     * @param $model
     * @return mixed
     */
    public function allCacheByOption($model)
    {
        if (Cache::has($model->table.'.all.by.option')){
            $data = Cache::get($model->table.'.all.by.option');
        }else{
            $data = $model
                ->attr(['name' => 'category_id' ,'class' => 'form-control'])
                ->renderAsDropdown();
            Cache::remember($model->table.'.all.by.option', $this->getMinutes(), function () use($data){
                return $data;
            });
        }
        return $data;
    }

    /**
     * @return array
     */
    public function getAllowedAdd()
    {
        return $this->allowed_add;
    }
}