<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/24
 * Time: 8:46
 */

namespace App\Service\Theme;


use App\Service\TagService;
use Facades\App\Repositories\ArticleRepository;
use Facades\App\Repositories\DownloadRepository;
use Facades\App\Repositories\PictureRepository;
use Facades\App\Repositories\VidioRepository;
use App\Service\CategoryService;


class Theme implements ThemeService
{
    public function __construct(CategoryService $categoryService,TagService $tagService)
    {
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    /**
     * 获取调用的模板文件存放位置
     * @param $repository
     * @param $relation
     * @param $cate_id
     * @return mixed
     */
    public function getTheme($repository, $relation, $cate_id){
        return $repository::with($relation)->find($cate_id);
    }


    /**
     * 获取导航指向的模块
     * @param $cateRepository
     * @param $cate_id
     * @return array
     */
    public function getModuleModel($cateRepository, $cate_id){
        $category = $cateRepository->find($cate_id);

        switch ($category->module_id){
            case 1:
                return [
                    'repository' => ArticleRepository::class,
                    'relation' => 'articleArticleTag'
                ];
                break;
            case 2:
                return [
                    'repository' => PictureRepository::class,
                    'relation' => 'picturePictureTag'
                ];
                break;
            case 3:
                return [
                    'repository' => VidioRepository::class,
                    'relation' => 'vidioVidioTag'
                ];
                break;
            case 4:
                break;
            case 5:
                return [
                    'repository' => DownloadRepository::class,
                     'relation' => 'downloadDownloadTag'
                ];
                break;
            case 6:
                break;
        }
    }

    /**
     * 获取模块对应文档列表（带分页）
     * @param $id
     * @param int $Page
     * @return mixed
     */
    public function getList($id, $page = 1){
        //模块对应的数据库模型
        $moduleModel = $this->getModuleModel($this->categoryService->categoryRepository, $id);

        $lists = $moduleModel['repository']::with($moduleModel['relation'])->scopeQuery(function ($query) use($id){
            return $query->where(['category_id' => $id])->orderBy('id', 'desc');
        })->paginate($page);

        return $lists;
    }


    /**
     * 获取nestable插件处理后的导航json数据
     * @return mixed
     */
    public function getMenu(){
        return  $this->categoryService->allByJson();
    }

    /**
     * 获取模块内容
     * @param $cate_id
     * @param $id
     * @return mixed
     */
    public function getContent($cate_id, $id){

        //模块对应的数据库模型
        $moduleModel = $this->getModuleModel($this->categoryService->categoryRepository, $cate_id);

        $content = $moduleModel['repository']::with($moduleModel['relation'])->find($id);

        return $content;
    }

    /**
     * @param TagService $tagService
     */
    public function getAllTag(){
        $tags = $this->tagService->tagRepository->all();
        dd($tags);
    }

    /**
     * 获取模块的最新文章
     * @param $repository
     * @param $number //文章数量
     * @return mixed
     */
    public function getListNew($repository, $number){
        return $repository::scopeQuery(function ($query) use($number){
            return $query->orderBy('id','desc')->take($number);
        })->all();
    }

    /**
     * 单个模块数据关键词检索数据
     * @param $cate_id
     * @param null $key
     * @return mixed
     */
    public function searchByModule($cate_id, $key = null){
        $moduleModel = $this->getModuleModel($this->categoryService->categoryRepository->makeModel(), $cate_id);
        return $moduleModel['model']->search($key);
    }

}