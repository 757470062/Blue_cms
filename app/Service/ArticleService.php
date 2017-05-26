<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/26
 * Time: 10:32
 */

namespace App\Service;
use App\Repositories\ArticleRepositoryEloquent;
use App\Traits\DatatableTrait;
use App\Traits\MakedownTrait;
use Cache;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    use DatatableTrait ,MakedownTrait;

    /**
     * ArticleService constructor.
     * @param ArticleRepositoryEloquent $articleRepository
     */
    public function __construct(ArticleRepositoryEloquent $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDataById($id){
        $article = $this->articleRepository->find($id);
        if (empty($article)){
            abort(404);
        }else{
            return $article;
        }
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
     * @return mixed
     */
    public function getAllDataByCache(){
        if (Cache::has('article.all')){
            $data=Cache::get('article.all');
        }else{
            $data=Cache::rememberForever('article.all',function (){
                return $this->articleRepository->with(array('articleCategory' ,'articleBackUser'))->all();
            });
        }
        return $data;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){
        $datatable=$this->getDataByBlade(
            'data-table',
            $this->getAllDataByCache(),
            ['id','articleCategory','articleBackUser','title','keys','flag_id','clicks','photo','intro'],
            ['id','name','name'],
            ['#','所属分类','作者','标题','关键词','Flag','点击率','缩略图','简述','操作'],
            'back/article',
            false
        );
        return $datatable;
    }

    /**
     * @param $page
     * @return mixed
     */
    public function paginate($page){
        $article = $this->articleRepository->paginate($page);
        if (cache::has('article.all.paginate')){
            $article=Cache::get('article.all.paginate');
        }else{
            $article=Cache::forever('article.all.paginate',$article);
        }
        return $article;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        if(empty($request->file('photo'))){
            $article = $request->toArray();
        }else{
            $photo = Storage::disk('public')->put('',$request->file('photo'));
            $article = array_add(array_except($request->toArray() ,'photo') ,'photo' ,$photo);
        }
        $article = $this->getCodeByDell($article);
        $article=$this->articleRepository->create($article);
        if (empty($article)) {
            abort(500,'添加失败');
        }else{
            Cache::forget('article.all.paginate');
            Cache::forget('article.all');
            Log::info('添加新文档');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id){
        $article=$this->getDataById($id);
        if (empty($article)){
            abort(500,'未找到Id为：'.$id.'的文档');
        }else{
            return $article;
        }
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request , $id){
        $model = $this->articleRepository->find($id);
        if(empty($request->file('photo'))){
            $article = $request->toArray();
        }else{
            $photo = Storage::disk('public')->put('', $request->file('photo'));
            Storage::disk('public')->delete($model->photo);
            $article = array_add(array_except($request->toArray() ,'photo') ,'photo' ,$photo);
        }
        $article = $this->getCodeByDell($article);
        $article = $model->update($article);
        if (empty($article)){
            abort(500,'修改失败');
        }else{
            Cache::forget('article.all.paginate');
            Cache::forget('article.all');
            Log::info('修改'.$id.'的文档');
        }
    }

    /**
     * @param $id
     */
    public function delete($id){
        Storage::disk('public')->delete($this->getDataById($id)->photo);
        $article = $this->articleRepository->delete($id);
        if(empty($article)){
            abort(500,'删除失败');
        }else{
            Cache::forget('article.all.paginate');
            Cache::forget('article.all');
            Log::info('删除-'.$id.'的文档');
        }
    }
}