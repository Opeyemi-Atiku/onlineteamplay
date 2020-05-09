<?php

namespace App\Http\Controllers;
use App\Shout;
use App\Sender;
use App\Seasonstat;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $seasonstat = Seasonstat::where('user_id', Auth()->user()->id)->first();
        

        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }

        return view('home', compact('shouts', 'new_messages', 'seasonstat'));
    }
}
