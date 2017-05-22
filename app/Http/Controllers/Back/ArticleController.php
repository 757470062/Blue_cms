<?php

namespace App\Http\Controllers\Back;

use App\Repositories\ArticleRepository\ArticleRepository;
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
    public function create()
    {
        return view('back.article.create');
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
    public function edit($id)
    {
        $article=$this->articleRepository->edit($id);
        return view('back.article.edit',compact('article'));
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
