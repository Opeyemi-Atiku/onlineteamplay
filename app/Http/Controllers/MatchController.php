<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shout;
use App\Message;
use App\Premier;
use App\Super;
use App\Super_user;
use App\Premier_user;
use App\Sender;
use App\Contract;
use App\Application;
use App\Manager;
use App\Ticket;
use App\Ticket_response;
use App\Sfixture;
use App\Pfixture;
use App\Pstat;
use App\Sstat;

class MatchController extends Controller
{
    public function match($league, $match_id) {
        if($league == 'premier') {
            $match = Pfixture::where('id', $match_id)->get();
        }
        if($league == 'super') {
            $match = Sfixture::where('id', $match_id)->get();
        }

        
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        if(!Auth()->guest()) {

        
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.match', compact('shouts', 'new_messages', 'match'));
        }

        else {
            return view('pages.match', compact('shouts', 'match'));
        }
    }

    public function result($league, $result_id) {
         
        if($league == 'premier') {
            $result = Pfixture::where('id', $result_id)->first();
            $away_stat = Pstat::where(['fixture_id' => $result->id, 'side' => 'away'])->first();
            $home_stat = Pstat::where(['fixture_id' => $result->id, 'side' => 'home'])->first();



            
        }
        if($league == 'super') {
            $result = Sfixture::where('id', $result_id)->first();
            $stat = Pstat::where('fixture_id', $result->id)->first();
            
            $away_stat = Sstat::where(['fixture_id' => $result->id, 'side' => 'away'])->first();
            $home_stat = Sstat::where(['fixture_id' => $result->id, 'side' => 'home'])->first();
        }

        
        $home_players = User::where(['team' => $result->home , 'league' => $league, 'role' => 'user'])->get();
        $away_players = User::where(['team' => $result->away , 'league' => $league, 'role' => 'user'])->get();
        
        

        
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        if(!Auth()->guest()) {

        
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.result', compact('shouts', 'new_messages', 'away_stat', 'home_stat', 'result', 'league', 'home_players', 'away_players', 'stat'));
        }

        else {
            return view('pages.result', compact('shouts', 'result', 'away_stat', 'home_stat', 'league', 'home_players', 'away_players'));
        }
    }
}
