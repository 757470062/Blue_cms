<?php

namespace App\Http\Controllers\Web;

use App\Service\Cache\CacheServiceInterface;
use App\Service\CategoryService;
use App\Service\Theme\ThemeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Facades\App\Repositories\ArticleRepository;

class WebController extends Controller
{
    public function __construct(CategoryService $categoryService, ThemeService $themeService,CacheServiceInterface $cacheService)
    {
        $this->themeService = $themeService;
        $this->categoryService = $categoryService;
        $this->cacheService = $cacheService;
    }

    public function makeIndex(){
        $articlesNewTake = $this->themeService->getListNew(ArticleRepository::class, 10);
        return view('web.index', compact('articlesNewTake'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makeList($id){
        //分类
        $category = $this->themeService->getTheme($this->categoryService->categoryRepository->makeMOdel(), 'categoryModule', $id);
        //模块对应的数据库模型
        $lists = $this->themeService->getList($id, 15);

        return view('web.'.$category->categoryModule->list,compact('lists','category'));
    }

    /**
     * @param $cate_id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makeContent($cate_id, $id){
        //分类
        $category = $this->themeService->getTheme($this->categoryService->categoryRepository->makeMOdel(), 'categoryModule', $cate_id);
        //文档内容
        $content = $this->themeService->getContent($cate_id, $id);

        return view('web.'.$category->categoryModule->article, compact('content', 'category'));
    }

    public function makeTags(){
        return $this->themeService->getAllTag();
    }

    public function filterTag(){

    }

    public function search(Request $request, $cate_id){
        $key = $request->key;
        //分类
        $category = $this->themeService->getTheme($this->categoryService->categoryRepository->makeMOdel(), 'categoryModule', $cate_id);
        //搜索结果
        $lists = $this->themeService->searchByModule($cate_id, $key)->paginate(15);
        return view('web.'.$category->categoryModule->list, compact('lists', 'category' ,'key'));
    }


}
