<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/28
 * Time: 14:10
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\FriendRepository;
use App\Service\Cache\CacheService;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;

class FriendService
{
    use DatatableTrait, FileSystem;


    /**
     * FriendService constructor.
     * @param FriendRepository $friendRepository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(FriendRepository $friendRepository, CacheServiceInterface $cacheService)
    {
        $this->friendRepository = $friendRepository;
        $this->cacheService = $cacheService;
    }


    /**
     * @return \App\Traits\vista
     */
    public function index(){
        $this->cacheService->all($this->friendRepository->makeModel());
        $datatable=$this->getDataByBlade(
            'data-table',
            $this->cacheService->all(
                $this->friendRepository->makeModel()
            ),
            ['id','name','link','photo','state','sort'],
            [],
            ['#','合作商名称','网址','缩略图','显示状态','排序','操作'],
            'back/friend',
            false
        );
        return $datatable;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $friend = $this->friendRepository->create(
            $this->putOneFile($request, 'photo')
        );
        if (empty($friend)){
            abort(404, '新建友情链接失败');
        }
       event(new ForgetCacheEvent($this->friendRepository->makeModel()));
    }


    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $friend = $this->friendRepository->find($id)->update(
            $this->putOneFile($request, 'photo')
        );
        if (empty($friend)){
            abort(404, '修改ID：'.$id.'的友情链接未成功');
        }
        event(new ForgetCacheEvent($this->friendRepository->makeModel()));
    }


}