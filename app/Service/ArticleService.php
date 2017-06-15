<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:32
 */

namespace App\Service;
use App\Events\ForgetCacheEvent;
use App\Repositories\ArticleRepository;
use App\Traits\TagTrait;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use App\Traits\MakedownTrait;
use Cache;
use Illuminate\Http\Request;
use Log;

class ArticleService
{
    use DatatableTrait, MakedownTrait, FileSystem,ButtonTrait,TagTrait;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $articleRepository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(ArticleRepository $articleRepository, CacheServiceInterface $cacheService,  ArticleTagService $articleTagService)
    {
        $this->articleRepository = $articleRepository;
        $this->cacheService = $cacheService;
        $this->articleTagService = $articleTagService;
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
        return $this->getDataByAjax(
            $this->cacheService->all(
                $this->articleRepository->makeModel(),
                ['articleCategory' , 'articleBackUser']
            ),
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/article/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/article/destroy/{{ $id }}')
        );
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
        if (empty($article)) abort(404,'添加失败');

        $this->createTags(
            $request->all()['tag_id'],
            $this->articleTagService->repository->makeModel(),
            'article_id',
            $article->getAttribute('id'));

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
        if (empty($article)) abort(404,'修改失败');
/*        //删除tag
        $this->articleTagService->repository->deleteWhere(['article_id' => $id]);*/
        //添加tag
        $this->createTags(
            $request->all()['tag_id'],
            $this->articleTagService->repository->makeModel(),
            'article_id',
            $id);
        //清除缓存
        event(new ForgetCacheEvent($this->articleRepository->makeModel()));
    }

}