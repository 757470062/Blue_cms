<?php

namespace App\Http\Controllers\Web;

use App\Entities\Article;
use App\Mail\SendNewMessage;
use App\User;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userHOme(){
        return view('web.user.index');
    }

    public function message(){
        $user = User::find(Auth::user()->id);
        return view('web.user.message', compact('user'));
    }

    //
    public function setMessage(Request $request){
        empty($request->send_email_state) ? $state = 0 : $state = 1;
        $user = User::find(Auth::user()->id)->update(['send_email_state' => $state]);

        if (empty($user)) {
            abort(404, '修改推送状态出错');
            Log::info('修改推送状态出错');
        }else{
            return redirect()->back();
        }
    }

}
