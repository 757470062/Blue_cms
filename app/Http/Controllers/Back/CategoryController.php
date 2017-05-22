<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\CategoryRequest;
use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\ModuleRepository\ModuleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth.back:back');
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->categoryRepository->index();
        return view('back.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ModuleRepository $moduleRepository)
    {
        $modules=$moduleRepository->getAllDataByCache();
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
        $this->categoryRepository->store($request);
        return redirect('back/category');
    }


    /**
     * @param $id
     * @param ModuleRepository $moduleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createChild($id, ModuleRepository $moduleRepository){
        $modules=$moduleRepository->getAllDataByCache();
        return view('back.category.create_child',compact('modules','id'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeChild(CategoryRequest $request , $id){
        $this->categoryRepository->storeChild($request,$id);
        return redirect('back/category');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id ,ModuleRepository $moduleRepository){
        $modules=$moduleRepository->getAllDataByCache();
        $category = $this->categoryRepository->edit($id);
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
        $this->categoryRepository->update($request ,$id);
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
        $this->categoryRepository->deleteById($id);
        return redirect()->back();
    }
}
