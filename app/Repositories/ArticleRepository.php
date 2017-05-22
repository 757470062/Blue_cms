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
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ArticleRepository
{
    use DatatableTrait;

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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){
         $data = Article::all();
         if (cache::has('article.all')){
             $data=Cache::get('article.all');
         }else{
             $data=Cache::forever('article.all',$data);
         }
        $datatable=$this->getDataByBlade(
            'data-table',
            $data,
            ['id','articleCategory','title','keys','flag_id','clicks','user_id','photo','intro'],
            ['id','category_id'],
            ['#','所属分类','标题','关键词','Flag','点击率','作者','缩略图','简述','操作'],
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
        $article=Article::create($request->all());
        if (empty($article)) {
            abort(500,'添加失败');
        }
        Log::info('添加新文档');
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
        $article=Article::update($request->all());
        if (empty($article)){
            abort(500,'修改失败');
        }else{
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
            Log::info('删除-'.$id.'的文档');
        }

    }

}