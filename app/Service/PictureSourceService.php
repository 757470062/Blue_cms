<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/1
 * Time: 16:00
 */

namespace App\Service;


use App\Events\ForgetCacheEvent;
use App\Repositories\PictureRepository;
use App\Repositories\PictureSourceRepository;
use App\Service\Cache\CacheServiceInterface;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

class PictureSourceService
{
    use DatatableTrait;

    /**
     * PictureSourceService constructor.
     * @param PictureRepository $pictureRepository
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(PictureSourceRepository $pictureSourceRepository, CacheServiceInterface $cacheService)
    {
        $this->pictureSourceRepository = $pictureSourceRepository;
        $this->cacheService = $cacheService;
    }

    public function index(){
        return $this->getDataByBlade(
            'data-table',
            $this->cacheService->all($this->pictureSourceRepository->makeModel(), ['pictureSourcePicture']),
            ['id','pictureSourcePicture','name','src'],
            ['id','name'],
            ['#','所在图集','图片名称','图片地址','操作'],
            'back/picture-source',
            false
        );
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $pictureSource = $this->pictureSourceRepository->create($request->all());
        if (empty($pictureSource)) abort(404, '图集图片添加失败');
        event(new ForgetCacheEvent($this->pictureSourceRepository->makeModel()));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $pictureSource = $this->pictureSourceRepository->find($id)->update($request->all());
        if (empty($pictureSource)) abort(404, '图集图片资源修改失败');
        event(new ForgetCacheEvent($this->pictureSourceRepository->makeModel()));
    }

}