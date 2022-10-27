<?php

namespace App\Http\Controllers;

use App\Mail\SendToUsers;
use App\Mail\TestMail;
use App\Mail\TestMailMarkDown;
use App\Models\Link;
use App\Models\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('partials.home');
    }

    public function show($slug)
    {
        $link=Link::query()->where('slug',$slug)->firstOrFail();
        return redirect($link->link);
    }

    public function sendMail1()
    {
        $data=['name'=>'agha reza'];
        Mail::send(['html'=>'emails.testMail'],$data,function (Message $message) {
            $message->to('sirreza.hhh@gmail.com', 'rezaHosseini')
                ->subject('in test ast');
        });
    }
    public function sendMail()
    {
        Mail::send(new TestMail());
    }

    public function showTestMail()
    {
        return new TestMail();
    }

    public function senMailUsers()
    {
        $user=User::find(3);
        Mail::to($user)->send(new SendToUsers($user));
    }

    public function markdownTest()
    {
        return new TestMailMarkDown();
    }

    public function article()
    {
//        return json_encode(['name'=>'reza','family'=>'hosseini']);
        return response()->json(['error'=>'bad request'],401);
    }

    public function checkIndex()
    {


    }
}
