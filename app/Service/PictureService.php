<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/1
 * Time: 15:59
 */

namespace App\Service;


use App\Repositories\PictureRepository;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use App\Traits\TagTrait;
use Illuminate\Http\Request;

class PictureService
{
    use DatatableTrait, FileSystem, ButtonTrait, TagTrait;

    /**
     * PictureService constructor.
     * @param PictureRepository $pictureRepository
     */
    public function __construct(PictureRepository $pictureRepository, PictureTagService $pictureTagService)
    {
        $this->pictureRepository = $pictureRepository;
        $this->pictureTagService = $pictureTagService;
    }

    /**
     * @return \App\Traits\vista
     */
    public function index(){
        return  $this->getDataByAjax(
            $this->pictureRepository->with(['pictureCategory'])->all(),
            $this->getButton('查看图集', 'glyphicon glyphicon-save btn-md', 'back/picture-source/{{ $id }}').
            $this->getButton('添加图片', 'glyphicon glyphicon-open btn-md', '/back/picture-source/create/{{ $id }}').
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/picture/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/picture/destroy/{{ $id }}')
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $picture = $this->pictureRepository->create($this->putOneFile($request));
        if (empty($picture)) abort(404, '新建图集失败');
        //添加tag
        $this->createTags(
            $request->all()['tag_id'],
            $this->pictureTagService->repository->makeModel(),
            'picture_id',
            $picture->getAttribute('id')
        );
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $picture = $this->pictureRepository->find($id)->update($this->putOneFile($request));
        if (empty($picture)) abort(404, '修改图集失败');
/*        //删除tag
        $this->pictureTagService->repository->deleteWhere(['picture_id' => $id]);*/
        //添加tag
        $this->createTags(
            $request->all()['tag_id'],
            $this->pictureTagService->repository->makeModel(),
            'picture_id',
            $id
        );
    }
}