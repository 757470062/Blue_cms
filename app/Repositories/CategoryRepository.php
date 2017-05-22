<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/5
 * Time: 16:42
 */

namespace App\Repositories\CategoryRepository;


use App\Models\Category;
use App\Traits\NestableTrait;
use Log;
use Illuminate\Http\Request;
use Cache;

class CategoryRepository
{
    use NestableTrait;

    /**
     * @return mixed
     */
    public function getAllDataByCache(){
       if(Cache::has('category.all')){
            $data=Cache::get('category.all');
        }else{
            $data=Cache::rememberForever('category.all',function (){
                return Category::nested()->get();
            });
        }
        return $data;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getNestableByBlade($this->getAllDataByCache());
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $category=Category::create(array_add($request->toArray(),'parent_id',0));
        if (empty($category)){
            abort(500,'创建'.$request->name.'分类失败');
        }else{
            Cache::forget('category.all');
            Log::info('创建'.$request->name.'分类成功');
        }
    }


    /**
     * @param Request $request
     * @param $parent_id
     */
    public function storeChild(Request $request, $parent_id){
        $category=Category::create(array_add($request->toArray(),'parent_id',$parent_id));
        if (empty($category)){
            abort(500,'为ID：'.$parent_id.'的分类创建子分类失败。');
        }else{
            Cache::forget('category.all');
            Log::info('为ID：'.$parent_id.'的分类创建子分类');
        }
    }

    public function edit($id){
        $category = Category::find($id);
        if (empty($category)){
            abort(404);
        }
        return $category;
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $category=Category::find($id)->update($request->all());
        if(empty($category)){
            abort(500,'修改ID：'.$id.'的分类失败');
        }else{
            Cache::forget('category.all');
            Log::info('修改ID:'.$id.'的分类成功');
        }
    }

    /**
     * @param $id
     */
    public function deleteById($id){
        $category=Category::destroy($id);
        if (empty($category)){
            abort(500,'删除ID：'.$id.'的分类失败');
        }else{
            Cache::forget('category.all');
            Log::info('删除ID：'.$id.'的分类成功');
        }
    }

}