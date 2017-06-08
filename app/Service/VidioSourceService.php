<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/7
 * Time: 13:49
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\VidioSourceRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use App\Traits\MakedownTrait;
use Illuminate\Http\Request;

class VidioSourceService
{
    use FileSystem, DatatableTrait, ButtonTrait, MakedownTrait;


    public function __construct(VidioSourceRepository $repository, CacheServiceInterface $cacheService)
    {
        $this->repository = $repository;
        $this->cacheService = $cacheService;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getDataByAjax(
            $this->cacheService->all(
                $this->repository->makeModel(),['vidioSourceVidio']
            ),
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/vidio-source/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/vidio-source/destroy/{{ $id }}')
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request, $id){
        $vidioSource = $this->repository->create(
            $this->getCodeByDell(
                array_add($this->putMoreFile($request, ['photo','src']), 'vidio_id', $id)
            )
        );
        if (empty($vidioSource)) abort(404, '添加视频失败');
        event(new ForgetCacheEvent($this->repository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $vidioSource = $this->repository->find($id)->update(
            $this->getCodeByDell($this->putMoreFile($request,['photo', 'src']))
        );
        if (empty($vidioSource)) abort(404, '修改视频失败');
        event(new ForgetCacheEvent($this->repository->makeModel()));
    }
}