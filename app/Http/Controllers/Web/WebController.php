<?php

namespace App\Http\Controllers\Web;

use App\Entities\Article;
use App\Service\TagService;
use Facades\App\Repositories\ArticleTagRepository;
use Facades\App\Repositories\TagRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Service\CategoryService;
use App\Service\Theme\ThemeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
        $articlesNewTake = $this->themeService->getListNew(ArticleRepository::class, 8);
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


    /**
     * 获取排序后的模块数据
     * @param $type
     * @param $number
     * @param $order
     * @param int $sum
     * @return mixed
     */
    public function sortDataByCache($type, $number, $order, $sum = 100){
        //获取仓库
        $repository = $this->themeService->getModuleBytype($type);
        //获得最新数据
        $data = $repository::scopeQuery(function ($query) use ($sum, $order){
            return $query->orderBy($order,'desc')->take($sum);
        })->all();
        //缓存数据
        $data = Cache::remember($type.':orderBy:'.$order, 30, function () use($data){
            return $data;
        });

        return $data->take($number)->toJson();
    }

    /**
     * 获取排序后的模块数据
     * @param $type
     * @param $number
     * @param $order
     * @param int $sum
     * @return mixed
     */
    public function otherDataByCache($type, $number, $order, $sum = 100){
        //获取仓库
        $repository = $this->themeService->getModuleBytype($type);
        //获得最新数据
        $data = $repository::scopeQuery(function ($query) use ($sum, $order){
            return $query->orderBy($order,'desc')->take($sum);
        })->all();
        //缓存数据
        $data = Cache::remember($type.':orderBy:'.$order, 30, function () use($data){
            return $data;
        })->shuffle();

        return $data->take($number)->toJson();
    }

    /**
     * 获取排序后的模块数据
     * @param $cate_id
     * @param $number
     * @param $order
     * @param int $sum
     * @return mixed
     */
    public function categoryDataByCache($cate_id, $number, $order='id', $sum = 100){
        //获取仓库
        $repository = $this->themeService->getModuleModel($this->categoryService->categoryRepository, $cate_id)['repository'];
        //获得最新数据
        $data = $repository::scopeQuery(function ($query) use ($sum, $order, $cate_id){
            return $query->where('category_id', $cate_id)->orderBy($order,'desc')->take($sum);
        })->all();
        //缓存数据
        $data = Cache::remember($repository::makeModel()->table.':setCateId'.':orderBy:'.$order, 30, function () use($data){
            return $data;
        });

        return $data->take($number)->toJson();
    }

    /**
     * 获取排序后的模块数据
     * @param $cate_id
     * @param $number
     * @param $order
     * @param int $sum
     * @return mixed
     */
    public function otherCategoryDataByCache($cate_id, $number, $order='id', $sum = 100){
        //获取仓库
        $repository = $this->themeService->getModuleModel($this->categoryService->categoryRepository, $cate_id)['repository'];
        //获得最新数据
        $data = $repository::scopeQuery(function ($query) use ($sum, $order, $cate_id){
            return $query->where('category_id', $cate_id)->orderBy($order,'desc')->take($sum);
        })->all();
        //缓存数据
        $data = Cache::remember($repository::makeModel()->table.':setCateId'.':orderBy:'.$order, 30, function () use($data){
            return $data;
        })->shuffle();

        return $data->take($number)->toJson();
    }

    /**
     * 筛选文档
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function DataByArticle(){
        $key = $_GET['search'];
        $lists = $this->themeService->getListNew(ArticleRepository::class, 12);
        return view('web.article.search', compact('lists', 'key'));
    }


    /**
     * 通过TAG筛选到文档
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function DataByTag(){
       $lists = $this->themeService->getListNew(ArticleTagRepository::class, 12, ['articleTagArticle']);
       //return $lists;
       return view('web.article.tag', compact('lists'));
    }

    /**
     * 更新点击次数
     * @param $cate_id
     * @param $id
     */
    public function click($cate_id, $id){
        if ($this->categoryService->categoryRepository->find($cate_id)->categoryModule->id === 1){
            $article = ArticleRepository::find($id);
            $article->update(['clicks' => $article->clicks+1]);
        }
    }

}
