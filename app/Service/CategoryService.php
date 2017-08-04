<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:34
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\CategoryRepository;
use App\Service\Cache\Extend\CategoryCacheServiceInterface;
use App\Traits\NestableTrait;
use Illuminate\Http\Request;
use Log;

class CategoryService
{
    use NestableTrait;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     * @param CategoryCacheServiceInterface $cacheService
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getNestableByBlade($this->allByJson());
    }

    /**
     * nestable 生成json数据
     * @return mixed
     */
    public function allByJson(){
        return $this->categoryRepository->makeModel()->nested()->get();
    }

    /**
     * 利用nestable生成select和option,
     * @param null $category_id 选中id
     * @return mixed
     */
    public function allBySelect($category_id = null){
        return $this->categoryRepository->makeModel()
            ->attr(['name' => 'category_id' ,'class' => 'form-control'])
            ->selected($category_id)
            ->renderAsDropdown();
    }


    /**
     * @param Request $request
     */
    public function store(Request $request){
        $category=$this->categoryRepository->create(array_add($request->toArray(),'parent_id',0));
        if (empty($category)) abort(404,'创建'.$request->name.'分类失败');
    }

    /**
     * @param Request $request
     * @param $parent_id
     */
    public function storeChild(Request $request, $parent_id){
        $category=$this->categoryRepository->create(array_add($request->toArray(),'parent_id',$parent_id));
        if (empty($category)) abort(404,'为ID：'.$parent_id.'的分类创建子分类失败。');
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $category=$this->categoryRepository->find($id)->update($request->all());
        if(empty($category)){
            abort(404,'修改ID：'.$id.'的分类失败');
        }
    }

}