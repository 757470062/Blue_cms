<?php

namespace App\Http\Controllers\Back;

use App\Repositories\ArticleRepository\ArticleRepository;
use App\Repositories\CategoryRepository\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware('auth.back:back');
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = $this->articleRepository->index();
        return view('back.article.index', compact('datatable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->getAllDataByCacheOption();
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
         $this->articleRepository->store($request);
         return redirect('back/article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id ,CategoryRepository $categoryRepository)
    {
        $article=$this->articleRepository->edit($id);
        $category = $categoryRepository->getAllDataByCacheOption();
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
          $this->articleRepository->update($request, $id);
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
          $this->articleRepository->deleteById($id);
          return redirect()->back();
    }
}
