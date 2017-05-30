<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:34
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Service\Cache\Extend\CategoryCacheService;
use App\Traits\NestableTrait;
use Illuminate\Http\Request;
use Log;
use Cache;

class CategoryService
{
    use NestableTrait;

    public function __construct(CategoryRepositoryEloquent $categoryRepository, CategoryCacheService $cacheService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->cacheService = $cacheService;
    }


    /**
     * @return mixed
     */
    public function getAllDataByCacheOption(){
        if(Cache::has('category.all.option')){
            $data=Cache::get('category.all.option');
        }else{
            $data=Cache::rememberForever('category.all.option',function (){
                return $this->categoryRepository->makeModel()->attr(['name' => 'category_id' ,'class' => 'form-control'])
                    ->renderAsDropdown();
            });
        }
        return $data;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getNestableByBlade(
            $this->cacheService->allCacheByNestable(
                $this->categoryRepository->makeModel()
            )
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $category=$this->categoryRepository->create(array_add($request->toArray(),'parent_id',0));
        if (empty($category)){
            abort(500,'创建'.$request->name.'分类失败');
        }
        event(new ForgetCacheEvent(
            $this->categoryRepository->makeModel(),
            $this->cacheService->getRelation())
        );
    }

    /**
     * @param Request $request
     * @param $parent_id
     */
    public function storeChild(Request $request, $parent_id){
        $category=$this->categoryRepository->create(array_add($request->toArray(),'parent_id',$parent_id));
        if (empty($category)){
            abort(500,'为ID：'.$parent_id.'的分类创建子分类失败。');
        }
        event(new ForgetCacheEvent(
                $this->categoryRepository->makeModel(),
                $this->cacheService->getRelation())
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id){
        $category = $this->categoryRepository->find($id);
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
        $category=$this->categoryRepository->find($id)->update($request->all());
        if(empty($category)){
            abort(500,'修改ID：'.$id.'的分类失败');
        }
        event(new ForgetCacheEvent(
                $this->categoryRepository->makeModel(),
                $this->cacheService->getRelation())
        );
    }

}