<?php

namespace App\Http\Controllers\Back;

use App\Events\ForgetCacheEvent;
use App\Http\Requests\Back\DownloadRequest;
use App\Repositories\TagRepository;
use App\Service\CategoryService;
use App\Service\DownloadService;
use App\Service\DownloadTagService;
use App\Service\TagService;
use App\Traits\SelectTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    use SelectTrait;

    /**
     * DownloadController constructor.
     * @param DownloadService $service
     */
    public function __construct(DownloadService $service)
    {
        $this->middleware('auth.back:back');
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.download.index');
    }

    /**
     * @return mixed
     */
    public function indexData(){
        return $this->service->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryService $categoryService, TagService $tagService)
    {
        $category = $categoryService->cacheService->allCacheByOption(
            $categoryService->categoryRepository->makeModel()
        );
        $tags = $this->select2View($tagService->tagRepository->all());
        return view('back.download.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DownloadRequest $request)
    {
        $this->service->store($request);
        return redirect('back/download');
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
    public function edit($id, CategoryService $categoryService, TagService $tagService, DownloadTagService $downloadTagService)
    {
        $download = $this->service->repository->find($id);

        $category = $categoryService->cacheService->allCacheByOptionSelected(
            $categoryService->categoryRepository->makeModel(),
            $download->category_id
        );
       $tags = $this->select2View(
            $tagService->tagRepository->all(),
            $downloadTagService->repository->findWhere(['download_id' => $id])->toArray()
        );
        return view('back.download.edit', compact('download', 'category', 'tags'));
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
        return redirect('back/download');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->repository->delete($id);
        event(new ForgetCacheEvent($this->service->repository->makeModel()));
        return redirect()->back();
    }
}
