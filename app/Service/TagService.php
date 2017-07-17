<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/28
 * Time: 14:11
 */

namespace App\Service;


use App\Repositories\TagRepository;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

class TagService
{
    use DatatableTrait, ButtonTrait;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){
       return $this->getDataByAjax(
               $this->tagRepository->all(),
           $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/tag/edit/{{ $id }}').
           $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/tag/destroy/{{ $id }}')
       );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $tag = $this->tagRepository->create($request->all());
        if (empty($tag)) abort(404,'Tag标签添加失败');
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
       $tag = $this->tagRepository->find($id)->update($request->all());
       if (empty($tag)) abort(404,'Tag标签修改失败');
   }

}