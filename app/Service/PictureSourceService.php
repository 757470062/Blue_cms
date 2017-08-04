<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/1
 * Time: 16:00
 */

namespace App\Service;


use App\Repositories\PictureRepository;
use App\Repositories\PictureSourceRepository;
use App\Traits\ButtonTrait;
use App\Traits\DatatableTrait;
use App\Traits\FileSystem;
use Illuminate\Http\Request;

class PictureSourceService
{
    use DatatableTrait, FileSystem, ButtonTrait;

    /**
     * PictureSourceService constructor.
     * @param PictureRepository $pictureRepository
     */
    public function __construct(PictureSourceRepository $pictureSourceRepository)
    {
        $this->pictureSourceRepository = $pictureSourceRepository;
    }

    public function index(){
        return $this->getDataByAjax(
            $this->pictureSourceRepository->with(['pictureSourcePicture'])->all(),
            $this->getButton('修改', 'glyphicon glyphicon-edit btn-md', '/back/picture-source/edit/{{ $id }}').
            $this->getButton('删除', 'glyphicon glyphicon-trash btn-md', '/back/picture-source/destroy/{{ $id }}')
        );
    }

    /**
     * @param Request $request
     */
    public function store($id, Request $request){
        $pictureSource = $this->pictureSourceRepository->create(
            array_add(
                $this->putOneFile($request, 'src'),
                'picture_id', $id)
        );
        if (empty($pictureSource)) abort(404, '图集图片添加失败');
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $pictureSource = $this->pictureSourceRepository->find($id)->update($this->putOneFile($request, 'src'));
        if (empty($pictureSource)) abort(404, '图集图片资源修改失败');
    }

}