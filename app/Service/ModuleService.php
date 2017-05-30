<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:35
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\ModuleRepositoryEloquent;
use App\Service\Cache\CacheService;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Cache;
use Log;

class ModuleService
{
    use DatatableTrait;

    public function __construct(ModuleRepositoryEloquent $moduleRepository,CacheService $cacheService)
    {
        $this->moduleRepository = $moduleRepository;
        $this->cacheService = $cacheService;
    }


    /**
     * @return \App\Traits\vista
     */
    public function index(){
        $data = $this->cacheService->all($this->moduleRepository->makeModel());
        $datatable=$this->getDataByBlade(
            'data-table',
            $data,
            ['id','name','list','article','cover'],
            ['id','category_id'],
            ['#','分类名称','列表模板','文档模板','封面模板','操作'],
            'back/module',
            false
        );
        return $datatable;
    }


    /**
     * @param Request $request
     */
    public function store(Request $request){
        $module=$this->moduleRepository->create($request->all());
        if(empty($module)){
            abort(400,'新建模块出错');
        }
        event(new ForgetCacheEvent($this->moduleRepository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $module=$this->moduleRepository->find($id)->update($request->all());
        if(empty($module)){
            abort(400,'修改ID：'.$id.'模块出错');
        }
        event(new ForgetCacheEvent($this->moduleRepository->makeModel()));
    }


}