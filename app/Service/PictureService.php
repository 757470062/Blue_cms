<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/1
 * Time: 15:59
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\PictureRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

class PictureService
{
    use DatatableTrait;

    /**
     * PictureService constructor.
     * @param PictureRepository $pictureRepository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(PictureRepository $pictureRepository, CacheServiceInterface $cacheService)
    {
        $this->pictureRepository = $pictureRepository;
        $this->cacheService = $cacheService;
    }

    /**
     * @return \App\Traits\vista
     */
    public function index(){
        return  $this->getDataByBlade(
            'data-table',
            $this->cacheService->all($this->pictureRepository->makeModel(), ['pictureSourcePicture']),
            ['id','name','picture_tag_id','src'],
            [],
            ['#','图集名称','图片标签','图集描述','操作'],
            'back/picture',
            false
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $picture = $this->pictureRepository->create($request->all());
        if (empty($picture)) abort(404, '新建图集失败');
        event(new ForgetCacheEvent($this->pictureRepository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $picture = $this->pictureRepository->find($id)->update($request->all());
        if (empty($picture)) abort(404, '修改图集失败');
        event(new ForgetCacheEvent($this->pictureRepository->makeModel()));
    }
}