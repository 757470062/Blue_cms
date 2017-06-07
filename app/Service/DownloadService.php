<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/5
 * Time: 14:35
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\DownloadRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use Illuminate\Http\Request;

class DownloadService
{
    use FileSystem, DatatableTrait, ButtonTrait;

    /**
     * DownloadService constructor.
     * @param DownloadRepository $repository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(DownloadRepository $repository, CacheServiceInterface $cacheService)
    {
        $this->repository = $repository;
        $this->cacheService = $cacheService;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getDataByAjax(
            $this->cacheService->all($this->repository->makeModel(), ['downLoadCategory']),
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/download/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/download/destroy/{{ $id }}')
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $download = $this->repository->create(
            $this->putMoreFile($request, ['photo','src'] )
        );
        if (empty($download)) abort(404, '上传资料失败');
        event(new ForgetCacheEvent($this->repository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $download = $this->repository->find($id)->update(
                $this->putMoreFile($request, ['photo','src'])
        );
        if (empty($download)) abort(404, '修改资料失败');
        event(new ForgetCacheEvent($this->repository->makeModel()));
    }

}