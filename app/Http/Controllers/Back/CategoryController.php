<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\CategoryRequest;
use App\Service\CategoryService;
use App\Service\ModuleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{


    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth.back:back');
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->categoryService->index();
        return view('back.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ModuleService $moduleService)
    {
        $modules=$moduleService->getAllDataByCache();
        return view('back.category.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request);
        return redirect('back/category');
    }


    /**
     * @param $id
     * @param ModuleRepository $moduleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createChild($id, ModuleService $moduleService){
        $modules=$moduleService->getAllDataByCache();
        return view('back.category.create_child',compact('modules','id'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeChild(CategoryRequest $request , $id){
        $this->categoryService->storeChild($request,$id);
        return redirect('back/category');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id ,ModuleService $moduleService){
        $modules=$moduleService->getAllDataByCache();
        $category = $this->categoryService->edit($id);
        return view('back.category.edit',compact('category','modules'));
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
        $this->categoryService->update($request ,$id);
        return redirect('back/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->back();
    }
}
