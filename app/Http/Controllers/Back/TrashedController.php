<?php

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use Facades\App\Service\TrashedService;

class TrashedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.back:back');
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($type){
        return view('back.trashed.'.$type);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function trashed($type){
        return TrashedService::trashed($type);
    }

    /**
     * @param $type
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($type, $id){
        if (empty(TrashedService::restore($type, $id))){
            abort(404, '恢复数据失败');
        }
        return redirect()->back();
    }

    /**
     * @param $type
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destory($type, $id){
        if (empty(TrashedService::destory($type, $id))){
            abort(404, '恢复数据彻底删除失败');
        }
        return redirect()->back();
    }

}
