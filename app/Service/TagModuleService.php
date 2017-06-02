<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/28
 * Time: 14:11
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\TagModuleRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

class TagModuleService
{
    use DatatableTrait;

    /**
     * TagModuleService constructor.
     * @param TagModuleRepository $tagModuleRepository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(TagModuleRepository $tagModuleRepository, CacheServiceInterface $cacheService)
    {
        $this->tagModuleRepository = $tagModuleRepository;
        $this->cacheService = $cacheService;
    }

    public function index(){
        return $this->getDataByBlade(
            'data-table',
            $this->cacheService->all($this->tagModuleRepository->makeModel(), [

            ]),
            ['id','name'],
            [],
            ['#','TAG名称','操作'],
            'back/tag',
            false
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $tagModule = $this->tagModuleRepository->create($request->all());
        if (empty($tagModule)) abort(404, '添加具体模型TAG标签失败');
        event(new ForgetCacheEvent($this->tagModuleRepository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $tagModule = $this->tagModuleRepository->find($id)->update($request->all());
        if (empty($tagModule)) abort(404, '修改具体模型TAG标签失败');
        event(new ForgetCacheEvent($this->tagModuleRepository->makeModel()));
    }

}