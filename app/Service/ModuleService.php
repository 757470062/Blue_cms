<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:35
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\ModuleRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Cache;
use Log;

class ModuleService
{
    use DatatableTrait, ButtonTrait;


    /**
     * ModuleService constructor.
     * @param ModuleRepository $moduleRepository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(ModuleRepository $moduleRepository, CacheServiceInterface $cacheService)
    {
        $this->moduleRepository = $moduleRepository;
        $this->cacheService = $cacheService;
    }


    /**
     * @return \App\Traits\vista
     */
    public function index(){
       return $this->getDataByAjax(
           $this->cacheService->all(
               $this->moduleRepository->makeModel()
           ),
           $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/module/edit/{{ $id }}').
           $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/module/destroy/{{ $id }}')
       );
    }


    /**
     * @param Request $request
     */
    public function store(Request $request){
        $module=$this->moduleRepository->create($request->all());
        if(empty($module)) abort(404,'新建模块出错');
        event(new ForgetCacheEvent($this->moduleRepository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $module=$this->moduleRepository->find($id)->update($request->all());
        if(empty($module)) abort(404,'修改ID：'.$id.'模块出错');
        event(new ForgetCacheEvent($this->moduleRepository->makeModel()));
    }


}