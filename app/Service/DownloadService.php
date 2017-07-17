<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/5
 * Time: 14:35
 */

namespace App\Service;


use App\Repositories\DownloadRepository;
use App\Repositories\DownloadTagRepository;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use App\Traits\TagTrait;
use Illuminate\Http\Request;

class DownloadService
{
    use FileSystem, DatatableTrait, ButtonTrait, TagTrait;

    /**
     * DownloadService constructor.
     * @param DownloadRepository $repository
     */
    public function __construct(DownloadRepository $repository, DownloadTagRepository $downloadTagRepository)
    {
        $this->repository = $repository;
        $this->downloadTagRepository = $downloadTagRepository;
    }

    /**
     * @return mixed
     */
    public function index(){
        return $this->getDataByAjax(
            $this->repository->with(['downLoadCategory'])->all(),
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/download/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/download/destroy/{{ $id }}')
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){

        $download = $this->repository->create(
            $this->putMoreFile($request, ['photo','src'])
        );

        if (empty($download)) abort(404, '上传资料失败');

        $this->createTags(
            $request->all()['tag_id'],
            $this->downloadTagRepository->makeModel(),
            'download_id',
            $download->getAttribute('id'));
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
   /*     //删除tag
        $this->downloadTagRepository->deleteWhere(['download_id' => $id]);*/
        //添加tag
        $this->createTags(
            $request->all()['tag_id'],
            $this->downloadTagRepository->makeModel(),
            'download_id',
            $id
        );

    }

}