<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/28
 * Time: 14:11
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\TagRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

class TagService
{
    use DatatableTrait;

    public function __construct(TagRepository $tagRepository,CacheServiceInterface $cacheService)
    {
        $this->tagRepository = $tagRepository;
        $this->cacheService = $cacheService;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){
        $datatable=$this->getDataByBlade(
            'data-table',
            $this->cacheService->all($this->tagRepository->makeModel()),
            ['id','name'],
            [],
            ['#','TAG名称','操作'],
            'back/tag',
            false
        );
        return $datatable;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $tag = $this->tagRepository->create($request->all());
        if (empty($tag)) abort(404,'Tag标签添加失败');
        event(new ForgetCacheEvent($this->tagRepository));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
       $tag = $this->tagRepository->find($id)->update($request->all());
       if (empty($tag)) abort(404,'Tag标签修改失败');
       event(new ForgetCacheEvent($this->tagRepository));
   }

}