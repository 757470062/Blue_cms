<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/5/5
 * Time: 16:43
 */

namespace App\Repositories\ModuleRepository;


use App\Models\Module;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Cache;
use Log;

class ModuleRepository
{
    use DatatableTrait;

    /**
     * @return mixed
     */
    public function getAllDataByCache(){
        if (cache::has('module.all')){
            $data=Cache::get('module.all');
        }else{
            $data=Cache::rememberForever('module.all',function (){
                return Module::all();
            });
        }
        return $data;
    }

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



    public function store(Request $request){
       $module=Module::create($request->all());
       if(empty($module)){
           abort(500,'新建模块出错');
       }else{
           Cache::forget('module.all');
           Log::info('新建'.$request->name.'模块成功');
       }
    }

    public function edit($id){
        $module=Module::find($id);
        if(empty($module)){
            abort(500,'为找打ID：'.$id.'的模块');
        }else{
            return $module;
        }
    }

    public function update(Request $request, $id){
        $module=Module::find($id)->update($request->all());
        if(empty($module)){
            abort(500,'修改ID：'.$id.'模块出错');
        }else{
            Cache::forget('module.all');
            Log::info('修改ID：'.$id.'模块成功');
        }
    }

    public function deleteById($id){
        $module=Module::destroy($id);
        if(empty($module)){
            abort(500,'删除ID：'.$id.'模块出错');
        }else{
            Cache::forget('module.all');
            Log::info('删除ID：'.$id.'模块成功');
        }
    }

}