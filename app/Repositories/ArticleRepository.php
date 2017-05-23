<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/5
 * Time: 16:39
 */

namespace App\Repositories\ArticleRepository;


use App\Models\Article;
use App\Traits\DatatableTrait;
use App\Traits\MakedownTrait;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class ArticleRepository
{
    use DatatableTrait ,MakedownTrait;

    /**
     * @param $id
     * @return mixed
     */
    public function getDataById($id){
       $article = Article::find($id);
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
       $article = Article::where($map)->orderBy('id','desc')->get();
       return $article;
   }

   public function getAllDataByCache(){
       if (cache::has('article.all')){
           $data=Cache::get('article.all');

       }else{
           $data=Cache::rememberForever('article.all',function (){
               return Article::with('articleCategory','articleBackUser')->get();
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
        $article = Article::paginate($page);
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
            $photo = Storage::put('public',$request->file('photo'),'public');
            $article = array_add(array_except($request->toArray() ,'photo') ,'photo' ,$photo);
        }
        $article = $this->getCodeByDell($article);
        $article=Article::create($article);
        if (empty($article)) {
            abort(500,'添加失败');
        }else{
            Cache::forget('article.all.paginate');
            Cache::forget('article.all');
            Log::info('添加新文档');
        }
    }

    public function edit($id){
        $article=Article::find($id);
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
        $model = Article::find($id);
        if(empty($request->file('photo'))){
            $article = $request->toArray();
        }else{
            $photo = Storage::put('public', $request->file('photo'));
            Storage::delete($model->photo);
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
    public function deleteById($id){
        $article=Article::destroy($id);
        if(empty($article)){
         abort(500,'删除失败');
        }else{
            Cache::forget('article.all.paginate');
            Cache::forget('article.all');
            Log::info('删除-'.$id.'的文档');
        }

    }

}