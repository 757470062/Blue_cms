<?php

namespace App\Http\Controllers\Back;

use App\Events\ForgetCacheEvent;
use App\Http\Requests\Back\FriendRequest;
use Facades\App\Service\FriendService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{

    /**
     * FriendController constructor.
     * @param FriendService $friendService
     */
    public function __construct(FriendService $friendService)
    {
        $this->middleware('auth.back:back');
        $this->friendService = $friendService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.friend.index');
    }

    /**
     * @return \App\Traits\vista
     */
    public function indexData(){
        //return $this->friendService->index();
        return FriendService::index();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.friend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FriendRequest $request)
    {
        $this->friendService->store($request);
        return redirect('back/friend');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->friendService->friendRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $friend = $this->friendService->friendRepository->find($id);
        return view('back.friend.edit', compact('friend'));
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
        $this->friendService->update($request, $id);
        return redirect('back/friend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->friendService->friendRepository->delete($id);
        event(new ForgetCacheEvent(
            $this->friendService->friendRepository->makeModel()
        ));
        return redirect()->back();
    }
}
