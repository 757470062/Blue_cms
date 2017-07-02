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
use App\Service\Cache\CacheServiceInterface;
use App\Service\CategoryService;


class Theme implements ThemeService
{
    public function __construct(CategoryService $categoryService,CacheServiceInterface $cacheService,TagService $tagService)
    {
        $this->categoryService = $categoryService;
        $this->cacheService = $cacheService;
        $this->tagService = $tagService;
    }

    /**
     * 获取调用的模板文件存放位置
     * @param $model
     * @param $relation
     * @param $cate_id
     * @return mixed
     */
    public function getTheme($model, $relation, $cate_id){
        $theme = $model->with($relation)->find($cate_id);
        return $theme;
    }


    /**
     * 获取导航指向的模块
     * @param $model
     * @param $cate_id
     * @return array
     */
    public function getModuleModel($model, $cate_id){
        $model = $model->find($cate_id);

        switch ($model->module_id){
            case 1:
                return [
                    'model' => ArticleRepository::makeModel(),
                    'relation' => 'articleArticleTag'
                ];
                break;
            case 2:
                return [
                    'model' => PictureRepository::makeModel(),
                    'relation' => 'picturePictureTag'
                ];
                break;
            case 3:
                return [
                    'model' => VidioRepository::makeModel(),
                    'relation' => 'vidioVidioTag'
                ];
                break;
            case 4:
                break;
            case 5:
                return [
                    'model' => DownloadRepository::makeModel(),
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
     * @param int $perPage
     * @param int $Page
     * @return mixed
     */
    public function getList($id, $perPage, $page = 1){
        //模块对应的数据库模型
        $moduleModel = $this->getModuleModel($this->categoryService->categoryRepository->makeModel(), $id);

        $data = $moduleModel['model']->with($moduleModel['relation'])->where('category_id', $id)->paginate($perPage);
        //缓存的key
        $key = $moduleModel['model']->table.'.category_id.'.$id;

        //分页数据缓存
        $lists = $this->cacheService->paginate($data,$key,$page);
        return $lists;
    }


    /**
     * 获取nestable插件处理后的导航json数据
     * @return mixed
     */
    public function getMenu(){
        return  $this->categoryService->cacheService->allCacheByNestable(
            $this->categoryService->categoryRepository->makeModel()
        );
    }

    /**
     * 获取模块内容
     * @param $cate_id
     * @param $id
     * @return mixed
     */
    public function getContent($cate_id, $id){

        //模块对应的数据库模型
        $moduleModel = $this->getModuleModel($this->categoryService->categoryRepository->makeModel(), $cate_id);

        $content = $this->cacheService->all($moduleModel['model'],$moduleModel['relation']);

        //查找文章
         $content = $content->filter(function ($value) use($id){
            return $value->id == $id;
         });
        return $content;
    }

    /**
     * @param TagService $tagService
     */
    public function getAllTag(){
        $tags = $this->tagService->cacheService->all($this->tagService->tagRepository->makeModel());
        dd($tags);
    }

}