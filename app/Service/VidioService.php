<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/7
 * Time: 13:49
 */

namespace App\Service;


use App\Repositories\VidioRepository;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use App\Traits\MakedownTrait;
use App\Traits\TagTrait;
use Illuminate\Http\Request;

class VidioService
{
    use DatatableTrait, ButtonTrait, FileSystem, MakedownTrait, TagTrait;
    /**
     * VidioService constructor.
     * @param VidioRepository $repository
     */
    public function __construct(VidioRepository $repository, VidioTagService $vidioTagService)
    {
        $this->repository = $repository;
        $this->vidioTagService = $vidioTagService;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getDataByAjax(
            $this->repository->with(['vidioCategory'])->all(),
            $this->getButton('查看视频集', 'glyphicon glyphicon-save btn-md', 'back/vidio-source/{{ $id }}').
            $this->getButton('添加视频', 'glyphicon glyphicon-open btn-md', '/back/vidio-source/create/{{ $id }}').
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/vidio/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/vidio/destroy/{{ $id }}')
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $vidio = $this->repository->create($this->getCodeByDell($this->putOneFile($request)));
        if (empty($vidio)) abort(404, '新建视频集失败');
        //添加tag
        $this->createTags(
            $request->all()['tag_id'],
            $this->vidioTagService->repository->makeModel(),
            'vidio_id',
            $vidio->getAttribute('id')
        );
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $vidio = $this->repository->find($id)->update($this->getCodeByDell($this->putOneFile($request)));
        if (empty($vidio)) abort(404, '修改视频集失败');
/*        //删除tag
        $this->vidioTagService->repository->deleteWhere('vidio_id',$id);*/
        //添加tag
        $this->createTags(
            $request->all()['tag_id'],
            $this->vidioTagService->repository->makeModel(),
            'vidio_id',
            $id
         );
    }
}