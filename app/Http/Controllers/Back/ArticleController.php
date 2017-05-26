<?php

namespace App\Http\Controllers\Back;

use App\Service\ArticleService;
use App\Service\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function __construct(ArticleService $articleService)
    {
        $this->middleware('auth.back:back');
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = $this->articleService->index();
        return view('back.article.index', compact('datatable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryService $categoryService)
    {
        $category = $categoryService->getAllDataByCacheOption();
        return view('back.article.create' ,compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->articleService->store($request);
         return redirect('back/article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id ,CategoryService $categoryService)
    {
        $article=$this->articleService->getDataById($id);
        $category = $categoryService->getAllDataByCacheOption();
        return view('back.article.edit',compact('article','category'));
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
          $this->articleService->update($request, $id);
          return redirect('back/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $this->articleService->delete($id);
          return redirect()->back();
    }


    public function showPhoto($src){
        return \Response::file(storage_path('app\\public\\'.$src));
    }
}
