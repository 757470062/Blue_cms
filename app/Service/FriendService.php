<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/28
 * Time: 14:10
 */

namespace App\Service;


use App\Repositories\FriendRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;

class FriendService
{
    /**
     * FriendService constructor.
     * @param FriendRepositoryEloquent $friendRepository
     */
    public function __construct(FriendRepositoryEloquent $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }


    public function getAllDataByCache(){
        $this->friendRepository->getCacheKey('');
    }

    public function store(Request $request){
        $photo = $request->file('photo');
        $friend = $request->toArray();
        if (!empty($photo)){
            $photo = Storage::disk('public')->put('', $photo);
            $friend = array_add(array_except($friend, 'photo'), 'photo', $photo);
        }

        $friend = $this->friendRepository->create($friend);
        if (empty($friend)){
            Log::info('新建友情链接失败');
        }else{
            Log::info('新建友情链接成功');
        }
    }


    public function update(Request $request, $id){
        $friend = $this->friendRepository->find($id)->update($request->all());
        if (empty($friend)){
            Log::info('修改ID：'.$id.'的友情链接未成功');
        }else{
            Log::info('修改ID：'.$id.'的友情链接成功');
        }
    }


}