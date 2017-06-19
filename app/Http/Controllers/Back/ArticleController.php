<?php

namespace App\Http\Controllers\Back;

use App\Events\ForgetCacheEvent;
use App\Http\Requests\Back\ArticleRequest;
use App\Service\ArticleService;
use App\Service\ArticleTagService;
use App\Service\CategoryService;
use App\Service\TagService;
use App\Traits\SelectTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    use SelectTrait;

    public function __construct(ArticleService $articleService,TagService $tagService)
    {
        $this->middleware('auth.back:back');
        $this->articleService = $articleService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.article.index');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function indexData(){
        return $this->articleService->index();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryService $categoryService)
    {
        $category = $categoryService->cacheService->allCacheByOption(
            $categoryService->categoryRepository->makeModel()
        );

        $tags = $this->select2View($this->tagService->tagRepository->all());
        return view('back.article.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
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
        $article=$this->articleService->articleRepository->find($id);
        $category = $categoryService->cacheService->allCacheByOptionSelected(
            $categoryService->categoryRepository->makeModel(),
            $article->category_id
        );
        $tags = $this->select2View(
            $this->tagService->tagRepository->all(),
            $this->articleService->articleTagService->repository->findWhere(['article_id' => $id])->toArray()
            );
        return view('back.article.edit', compact('article', 'category', 'tags'));
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
          $this->articleService->articleRepository->delete($id);
          event(new ForgetCacheEvent(
              $this->articleService->articleRepository->makeModel()
          ));
          return redirect()->back();
    }

}
