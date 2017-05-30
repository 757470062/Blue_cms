<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:32
 */

namespace App\Service;
use App\Events\ForgetCacheEvent;
use App\Repositories\ArticleRepositoryEloquent;
use App\Service\Cache\CacheService;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use App\Traits\MakedownTrait;
use Cache;
use Illuminate\Http\Request;
use Log;

class ArticleService
{
    use DatatableTrait, MakedownTrait, FileSystem;


    /**
     * ArticleService constructor.
     * @param ArticleRepositoryEloquent $articleRepository
     * @param ArticleService $articleService
     */
    public function __construct(ArticleRepositoryEloquent $articleRepository, CacheService $cacheService)
    {
        $this->articleRepository = $articleRepository;
        $this->cacheService = $cacheService;
    }

    /**
     * @param array $map
     * @return mixed
     */
    public function getDataBySearch(array $map){
        $article = $this->articleRepository->where($map)->orderBy('id','desc')->get();
        return $article;
    }



    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){
        $datatable=$this->getDataByBlade(
            'data-table',
            $this->cacheService->all(
                $this->articleRepository->makeModel(), ['articleCategory', 'articleBackUser']
            ),
            ['id','articleCategory','articleBackUser','title','keys','flag_id','clicks','photo','intro'],
            ['id','name','name'],
            ['#','所属分类','作者','标题','关键词','Flag','点击率','缩略图','简述','操作'],
            'back/article',
            false
        );
        return $datatable;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $article=$this->articleRepository->create(
            $this->getCodeByDell(
                $this->putOneFile($request, 'photo')
            )
        );
        if (empty($article)) {
            abort(400,'添加失败');
        }
        event(new ForgetCacheEvent($this->articleRepository->makeModel()));
    }


    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request , $id){
        $model = $this->articleRepository->find($id);
        $article = $model->update(
            $this->getCodeByDell(
                $this->putOneFile($request, 'photo')
            )
        );
        if (empty($article)){
            abort(400,'修改失败');
        }
        event(new ForgetCacheEvent($this->articleRepository->makeModel()));
    }

}