<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\PictureRequest;
use App\Service\Cache\CacheServiceInterface;
use App\Service\Cache\Extend\CategoryCacheServiceInterface;
use App\Service\CategoryService;
use App\Service\PictureService;
use App\Service\TagService;
use App\Traits\SelectTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureController extends Controller
{
    use SelectTrait;

    /**
     * PictureController constructor.
     * @param PictureService $service
     */
    public function __construct(PictureService $service, TagService $tagService)
    {
        $this->middleware('auth.back:back');
        $this->service = $service;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.picture.index');
    }

    /**
     * @return \App\Traits\vista
     */
    public function indexData(){
        return $this->service->index();
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
        return view('back.picture.create',compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureRequest $request)
    {
        $this->service->store($request);
        return redirect('back/picture');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CategoryService $categoryService)
    {
        $picture = $this->service->pictureRepository->find($id);

        $category = $categoryService->cacheService->allCacheByOptionSelected(
            $categoryService->categoryRepository->makeModel(),
            $picture->category_id
        );

        $tags = $this->select2View(
            $this->tagService->tagRepository->all(),
            $this->service->pictureTagService->repository->findWhere(['picture_id' => $id])->toArray()
            );
        return view('back.picture.edit', compact('picture', 'category', 'tags'));
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
        $this->service->update($request, $id);
        return redirect('back/picture');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->pictureRepository->delete($id);
        return redirect()->back();
    }
}
