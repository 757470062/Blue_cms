<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:35
 */

namespace App\Service;


use App\Repositories\ModuleRepositoryEloquent;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Cache;
use Log;

class ModuleService
{
    use DatatableTrait;

    public function __construct(ModuleRepositoryEloquent $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @return mixed
     */
    public function getAllDataByCache(){
        if (cache::has('module.all')){
            $data=Cache::get('module.all');
        }else{
            $data=Cache::rememberForever('module.all',function (){
                return $this->moduleRepository->all();
            });
        }
        return $data;
    }

    /**
     * @return \App\Traits\vista
     */
    public function index(){
        $data = $this->getAllDataByCache();
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
            abort(500,'新建模块出错');
        }else{
            Cache::forget('module.all');
            Log::info('新建'.$request->name.'模块成功');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id){
        $module=$this->moduleRepository->find($id);
        if(empty($module)){
            abort(500,'为找打ID：'.$id.'的模块');
        }else{
            return $module;
        }
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $module=$this->moduleRepository->find($id)->update($request->all());
        if(empty($module)){
            abort(500,'修改ID：'.$id.'模块出错');
        }else{
            Cache::forget('module.all');
            Log::info('修改ID：'.$id.'模块成功');
        }
    }

    /**
     * @param $id
     */
    public function delete($id){
        $module=$this->moduleRepository->delete($id);
        if(empty($module)){
            abort(500,'删除ID：'.$id.'模块出错');
        }else{
            Cache::forget('module.all');
            Log::info('删除ID：'.$id.'模块成功');
        }
    }

}