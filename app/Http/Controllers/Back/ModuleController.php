<?php

namespace App\Http\Controllers\Back;

use App\Events\ForgetCacheEvent;
use App\Http\Requests\Back\ModuleRequest;
use App\Service\ModuleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{

    /**
     * ModuleController constructor.
     * @param ModuleService $moduleService
     */
    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService=$moduleService;
        $this->middleware('auth.back:back');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.module.index');
    }

    /**
     * @return \App\Traits\vista
     */
    public function indexData(){
        return $this->moduleService->index();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $this->moduleService->store($request);
        return redirect('back/module');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module=$this->moduleService->moduleRepository->find($id);
        return view('back.module.edit',compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->moduleService->update($request, $id);
        return redirect('back/module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = $this->moduleService->moduleRepository->delete($id);

        if (empty($module)) abort(404, '删除数据执行失败');

        return redirect()->back();
    }
}
