<?php

namespace App\Http\Controllers\Back;

use App\Events\ForgetCacheEvent;
use App\Http\Requests\Back\VidioSourceRequest;
use App\Service\VidioSourceService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VidioSourceController extends Controller
{

    /**
     * VidioSourceController constructor.
     * @param VidioSourceService $service
     */
    public function __construct(VidioSourceService $service)
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
        return view('back.vidio.source.index');
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
    public function create($id)
    {
        return view('back.vidio.source.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VidioSourceRequest $request, $id)
    {
        $this->service->store($request, $id);
        return redirect('back/vidio');
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
    public function edit($id)
    {
        $vidioSource = $this->service->repository->find($id);
        return view('back.vidio.source.edit', compact('vidioSource'));
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
        //dd($request->all());
        $this->service->update($request, $id);
        return redirect('back/vidio');
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

        return redirect()->back();
    }
}
