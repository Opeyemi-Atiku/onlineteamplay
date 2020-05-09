<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
use App\Sfixture;
use App\Pfixture;
use App\Pstat;
use App\Pgame;
use App\Pvoid;
use App\Pstat_temp;
use App\Sstat;
use App\Sgame;
use App\Svoid;
use App\Sstat_temp;
use App\Record;
use App\Seasonstat;

class ManagersController extends Controller
{
     public function my_players($id) {
        $manager = User::where('id', $id)->get();
        $team = $manager[0]->team;
        $users = User::where(['role' => 'user','team' => $team])->get();
        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
        return view('manager.myPlayers', compact('users', 'shouts', 'new_messages'));
    }

    public function position(Request $request) {
        $user = user::where('id', $request->user_id)->update([
            'position' => $request->position
        ]);
        return $user;
    }

    public function release($id) {
    	User::where('id', $id)->update([
    	    		'team' => NULL,
    	    		'league' => NULL,
    	    	]);

    }

    public function submit_score(Request $request) {
        $manager = User::where('id', Auth::User()->id)->get();
        $team = $manager[0]->team;
        $users = User::where(['role' => 'user','team' => $team])->get();
        $GLOBALS['team'] = $team;
        if($manager[0]->league == 'premier') {
            
            $fixs = Pgame::where('manager_id', Auth::User()->id)->where('void', 0)->first();

            $score = Pgame::where('fixture_id', $fixs->fixture_id)->where('manager_id', Auth::User()->id)->where('home_score', '!=', NULL)->get();
        }
        else{
            $fixs = Sgame::where('manager_id', Auth::User()->id)->where('void', 0)->first();

            $score = Sgame::where('fixture_id', $fixs->fixture_id)->where('manager_id', Auth::User()->id)->where('home_score', '!=', NULL)->get();
        }

        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }

        return view('manager.submit', compact('users', 'shouts', 'new_messages', 'fixs', 'score'));
    }

    public function score(Request $request) {
        if(Auth::User()->league == 'premier') {
            $sel = Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->where('home_score', '!=', NULL)->get();
            if(count($sel) > 0) {
                return 'Score Submitted already';
            }

            $sel2 = Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', '!=' , Auth::User()->id)->where('home_score', '!=', NULL)->get();
            if(count($sel2) > 0) {
                if($sel2[0]->home_score == $request->home_score && $sel2[0]->away_score == $request->away_score) {
                    if($request->home_score == 0) {
                        $rec1 = User::where('team', $request->away)->where('role', 'user')->where('position', 'GK')->first();
                        $up1 = Record::where('team', $request->away)->where('user_id', $rec1->id)->first();
                        Record::where('team', $request->away)->where('user_id', $rec1->id)->update([
                            'clean_sheets' => $up1->clean_sheets + 1
                        ]);
                        $sea1 = Seasonstat::where('user_id', $rec1->id)->first();
                        Seasonstat::where('user_id', $rec1->id)->update([
                            'clean_sheets' => $sea1->clean_sheets + 1
                        ]);
                    }
                    if($request->away_score == 0) {
                        $rec = User::where('team', $request->home)->where('role', 'user')->where('position', 'GK')->first();
                        $up = Record::where('team', $request->home)->where('user_id', $rec->id)->first();
                        Record::where('team', $request->home)->where('user_id', $rec->id)->update([
                            'clean_sheets' => $up->clean_sheets + 1
                        ]);
                        $sea2 = Seasonstat::where('user_id', $rec->id)->first();
                        Seasonstat::where('user_id', $rec->id)->update([
                            'clean_sheets' => $sea2->clean_sheets + 1
                        ]);
                    }
                    if($request->home_score > $request->away_score) {
                        $home = Premier::where('team_name', $request->home)->first();
                        $home_GF = $home->GF + $request->home_score;
                        $home_GA = $home->GA + $request->away_score;
                        $home_GD = $home_GF - $home_GA;
                        $updateHome = Premier::where('team_name', $request->home)->update([
                            'GP' => $home->GP + 1,
                            'PTS' => $home->PTS + 3,
                            'W' => $home->W + 1,
                            'GF' => $home_GF,
                            'GA' => $home_GA,
                            'GD' => $home_GD
                        ]);

                        $away = Premier::where('team_name', $request->away)->first();
                        $away_GF = $away->GF + $request->away_score;
                        $away_GA = $away->GA + $request->home_score;
                        $away_GD = $away_GF - $away_GA;
                        $updateAway = Premier::where('team_name', $request->away)->update([
                            'GP' => $home->GP + 1,
                            'L' => $away->L + 1,
                            'GF' => $away_GF,
                            'GA' => $away_GA,
                            'GD' => $away_GD
                        ]);
                    }
                    if($request->home_score == $request->away_score) {
                        $home = Premier::where('team_name', $request->home)->first();
                        $home_GF = $home->GF + $request->home_score;
                        $home_GA = $home->GA + $request->away_score;
                        $home_GD = $home_GF - $home_GA;
                        $updateHome = Premier::where('team_name', $request->home)->update([
                            'GP' => $home->GP + 1,
                            'PTS' => $home->PTS + 1,
                            'D' => $home->D + 1,
                            'GF' => $home_GF,
                            'GA' => $home_GA,
                            'GD' => $home_GD
                        ]);

                        $away = Premier::where('team_name', $request->away)->first();
                        $away_GF = $away->GF + $request->away_score;
                        $away_GA = $away->GA + $request->home_score;
                        $away_GD = $away_GF - $away_GA;
                        $updateAway = Premier::where('team_name', $request->away)->update([
                            'GP' => $home->GP + 1,
                            'PTS' => $away->PTS + 1,
                            'D' => $away->D + 1,
                            'GF' => $away_GF,
                            'GA' => $away_GA,
                            'GD' => $away_GD
                        ]);
                    }
                    if($request->away_score > $request->home_score) {
                        $away = Premier::where('team_name', $request->away)->first();
                        $away_GF = $away->GF + $request->away_score;
                        $away_GA = $away->GA + $request->home_score;
                        $away_GD = $away_GF - $away_GA;
                        $updateAway = Premier::where('team_name', $request->away)->update([
                            'GP' => $away->GP + 1,
                            'PTS' => $away->PTS + 3,
                            'W' => $away->W + 1,
                            'GF' => $away_GF,
                            'GA' => $away_GA,
                            'GD' => $away_GD
                        ]);

                        $home = Premier::where('team_name', $request->home)->first();
                        $home_GF = $home->GF + $request->home_score;
                        $home_GA = $home->GA + $request->away_score;
                        $home_GD = $home_GF - $home_GA;
                        $updateHome = Premier::where('team_name', $request->home)->update([
                            'GP' => $home->GP + 1,
                            'L' => $home->L + 1,
                            'GF' => $home_GF,
                            'GA' => $home_GA,
                            'GD' => $home_GD
                        ]);
                    }
                    if($updateHome) {
                        Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->update([
                            'home_score' => $request->home_score,
                            'away_score' => $request->away_score
                        ]);

                        Pfixture::where('id', $request->fixture_id)->update([
                            'home_score' => $request->home_score,
                            'away_score' => $request->away_score,
                            'played' => 1
                        ]);
                        return 'Score matched and submitted';
                    }
                }
                else {
                    return 'score do not match, input correct score or create a ticket to complain';
                }
            }
            else {
                Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->update([
                    'home_score' => $request->home_score,
                    'away_score' => $request->away_score
                ]);
            return 'Score Submitted';
            }
        }
        else {
            $sel = Sgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->where('home_score', '!=', NULL)->get();
            if(count($sel) > 0) {
                return 'Score Submitted already';
            }

            $sel2 = Sgame::where('fixture_id', $request->fixture_id)->where('manager_id', '!=' , Auth::User()->id)->where('home_score', '!=', NULL)->get();
            if(count($sel2) > 0) {
                if($sel2[0]->home_score == $request->home_score && $sel2[0]->away_score == $request->away_score) {
                    if($request->home_score == 0) {
                        $rec1 = User::where('team', $request->away)->where('role', 'user')->where('position', 'GK')->first();
                        $up1 = Record::where('team', $request->away)->where('user_id', $rec1->id)->first();
                        Record::where('team', $request->away)->where('user_id', $rec1->id)->update([
                            'clean_sheets' => $up1->clean_sheets + 1
                        ]);
                        $sea1 = Seasonstat::where('user_id', $rec1->id)->first();
                        Seasonstat::where('user_id', $rec1->id)->update([
                            'clean_sheets' => $sea1->clean_sheets + 1
                        ]);
                    }
                    if($request->away_score == 0) {
                        $rec = User::where('team', $request->home)->where('role', 'user')->where('position', 'GK')->first();
                        $up = Record::where('team', $request->home)->where('user_id', $rec->id)->first();
                        Record::where('team', $request->home)->where('user_id', $rec->id)->update([
                            'clean_sheets' => $up->clean_sheets + 1
                        ]);
                        $sea2 = Seasonstat::where('user_id', $rec->id)->first();
                        Seasonstat::where('user_id', $rec->id)->update([
                            'clean_sheets' => $sea2->clean_sheets + 1
                        ]);
                    }
                    if($request->home_score > $request->away_score) {
                        $home = Super::where('team_name', $request->home)->first();
                        $home_GF = $home->GF + $request->home_score;
                        $home_GA = $home->GA + $request->away_score;
                        $home_GD = $home_GF - $home_GA;
                        $updateHome = Super::where('team_name', $request->home)->update([
                            'GP' => $home->GP + 1,
                            'PTS' => $home->PTS + 3,
                            'W' => $home->W + 1,
                            'GF' => $home_GF,
                            'GA' => $home_GA,
                            'GD' => $home_GD
                        ]);

                        $away = Super::where('team_name', $request->away)->first();
                        $away_GF = $away->GF + $request->away_score;
                        $away_GA = $away->GA + $request->home_score;
                        $away_GD = $away_GF - $away_GA;
                        $updateAway = Super::where('team_name', $request->away)->update([
                            'GP' => $home->GP + 1,
                            'L' => $away->L + 1,
                            'GF' => $away_GF,
                            'GA' => $away_GA,
                            'GD' => $away_GD
                        ]);
                    }
                    if($request->home_score == $request->away_score) {
                        $home = Super::where('team_name', $request->home)->first();
                        $home_GF = $home->GF + $request->home_score;
                        $home_GA = $home->GA + $request->away_score;
                        $home_GD = $home_GF - $home_GA;
                        $updateHome = Super::where('team_name', $request->home)->update([
                            'GP' => $home->GP + 1,
                            'PTS' => $home->PTS + 1,
                            'D' => $home->D + 1,
                            'GF' => $home_GF,
                            'GA' => $home_GA,
                            'GD' => $home_GD
                        ]);

                        $away = Super::where('team_name', $request->away)->first();
                        $away_GF = $away->GF + $request->away_score;
                        $away_GA = $away->GA + $request->home_score;
                        $away_GD = $away_GF - $away_GA;
                        $updateAway = Super::where('team_name', $request->away)->update([
                            'GP' => $home->GP + 1,
                            'PTS' => $away->PTS + 1,
                            'D' => $away->D + 1,
                            'GF' => $away_GF,
                            'GA' => $away_GA,
                            'GD' => $away_GD
                        ]);
                    }
                    if($request->away_score > $request->home_score) {
                        $away = Super::where('team_name', $request->away)->first();
                        $away_GF = $away->GF + $request->away_score;
                        $away_GA = $away->GA + $request->home_score;
                        $away_GD = $away_GF - $away_GA;
                        $updateAway = Super::where('team_name', $request->away)->update([
                            'GP' => $away->GP + 1,
                            'PTS' => $away->PTS + 3,
                            'W' => $away->W + 1,
                            'GF' => $away_GF,
                            'GA' => $away_GA,
                            'GD' => $away_GD
                        ]);

                        $home = Super::where('team_name', $request->home)->first();
                        $home_GF = $home->GF + $request->home_score;
                        $home_GA = $home->GA + $request->away_score;
                        $home_GD = $home_GF - $home_GA;
                        $updateHome = Super::where('team_name', $request->home)->update([
                            'GP' => $home->GP + 1,
                            'L' => $home->L + 1,
                            'GF' => $home_GF,
                            'GA' => $home_GA,
                            'GD' => $home_GD
                        ]);
                    }
                    if($updateHome) {
                        Sgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->update([
                            'home_score' => $request->home_score,
                            'away_score' => $request->away_score
                        ]);
    
                        Sfixture::where('id', $request->fixture_id)->update([
                            'home_score' => $request->home_score,
                            'away_score' => $request->away_score,
                            'played' => 1
                        ]);
                        return 'Score matched and submitted';
                    }
                    
                }
                else {
                    return 'score do not match, input correct score or create a ticket to complain';
                }
            }
            else {
                Sgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->update([
                    'home_score' => $request->home_score,
                    'away_score' => $request->away_score
                ]);
            return 'Score Submitted';
            }   
        }
        
        
        
    }

    public function stat(Request $request) {

        if(Auth::User()->league == 'premier') {
            $sel = Pstat_temp::where('fixture_id', $request->fixture_id)->where('manager_id', '!=',Auth::user()->id)->get();
            if(count($sel) > 0) {
                if($sel[0]->side == 'home') {
                    $side2 = 'away';
                }
                else {
                    $side2 = 'home';
                }
                Pstat::create([
                    'fixture_id' => $request->fixture_id,
                    'manager_id' => Auth::User()->id,
                    'side' => $side2,
                    'goal' => $request->goal,
                    'assist' => $request->assist,
                    'man_of_match' => $request->man_of_match,
                    'yellow_card' => $request->yellow_card,
                    'red_card' => $request->red_card
                ]);

                Pstat::create([
                    'fixture_id' => $sel[0]->fixture_id,
                    'manager_id' => $sel[0]->manager_id,
                    'side' => $sel[0]->side,
                    'goal' => $sel[0]->goal,
                    'assist' => $sel[0]->assist,
                    'man_of_match' => $sel[0]->man_of_match,
                    'yellow_card' => $sel[0]->yellow_card,
                    'red_card' => $sel[0]->red_card
                ]);
                
                if($request->goal != "" && $request->goal != "0") {
                    $array1 = explode(' ', $request->goal);
                    $goal1 = array_count_values($array1);
                    foreach ($goal1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'goal' => $user1->goal + $value
                        ]);
                        $rec_g1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'goals' => $rec_g1->goals + $value
                        ]);
                        $sea_g1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'goals' => $sea_g1->goals + $value
                        ]);
                    }
                }
                
                if($sel[0]->goal != "" && $sel[0]->goal != "0") {
                    $array2 = explode(' ', $sel[0]->goal);
                    $goal2 = array_count_values($array2);
                    foreach ($goal2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'goal' => $user2->goal + $value
                        ]);
                        $rec_g2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'goals' => $rec_g2->goals + $value
                        ]);
                        $sea_g2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'goals' => $sea_g2->goals + $value
                        ]);
                    }
                }

                if($request->assist != "" && $request->assist != "0") {
                    $array3 = explode(' ', $request->assist);
                    $assist1 = array_count_values($array3);
                    foreach ($assist1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'assist' => $user1->assist + $value
                        ]);
                        $rec_a1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'assists' => $rec_a1->assists + $value
                        ]);
                        $sea_a1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'assists' => $sea_a1->assists + $value
                        ]);
                    }
                }
                
                if($sel[0]->assist != "" && $sel[0]->assist != "0") {
                    $array4 = explode(' ', $sel[0]->assist);
                    $assist2 = array_count_values($array4);
                    foreach ($assist2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'assist' => $user2->assist + $value
                        ]);
                        $rec_a2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'assists' => $rec_a2->assists + $value
                        ]);
                        $sea_a2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'assists' => $sea_a2->assists + $value
                        ]);
                    }
                }
                if($request->yellow_card == '0') {
                    
                }
                else {
                    $array5 = explode(' ', $request->yellow_card);
                    $yellow1 = array_count_values($array5);
                    foreach ($yellow1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'yellow' => $user1->yellow + $value
                        ]);
                        $rec_y1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'yellow' => $rec_y1->yellow + $value
                        ]);
                        $sea_y1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'yellow' => $sea_y1->yellow + $value
                        ]);
                    }
                }

                if($sel[0]->yellow_card == '0') {
                    
                }
                else {
                    $array6 = explode(' ', $sel[0]->yellow_card);
                    $yellow2 = array_count_values($array6);
                    foreach ($yellow2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'yellow' => $user2->yellow + $value
                        ]);
                        $rec_y2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'yellow' => $rec_y2->yellow + $value
                        ]);
                        $sea_y2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'yellow' => $sea_y2->yellow + $value
                        ]);
                    }
                }
                
                if($request->red_card == '0') {

                }
                else {
                    $array7 = explode(' ', $request->red_card);
                    $red1 = array_count_values($array7);
                    foreach ($red1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'red' => $user1->red + $value
                        ]);
                        $rec_r1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'red' => $rec_r1->red + $value
                        ]);
                        $sea_r1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'red' => $sea_r1->red + $value
                        ]);
                    }
                }

                if($sel[0]->red_card == '0') {
                    
                }
                else {
                    $array8 = explode(' ', $sel[0]->red_card);
                    $red2 = array_count_values($array8);
                    foreach ($red2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'red' => $user2->red + $value
                        ]);
                        $rec_r2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'red' => $rec_r2->red + $value
                        ]);
                        $sea_r2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'red' => $sea_r2->red + $value
                        ]);
                    }
                }

                if($request->man_of_match == '0') {

                }
                else {
                        $motm1 = User::where('id', $request->man_of_match)->first();
                        User::where('id', $request->man_of_match)->update([
                            'motm' => $motm1->motm + 1
                        ]);
                        $rec_m1 = Record::where('user_id', $request->man_of_match)->where('team', $motm1->team)->first();
                        Record::where('user_id', $request->man_of_match)->where('team', $motm1->team)->update([
                            'motm' => $rec_m1->motm + 1
                        ]);
                        $sea_m1 = Seasonstat::where('user_id', $request->man_of_match)->first();
                        Seasonstat::where('user_id', $request->man_of_match)->update([
                            'motm' => $sea_m1->motm + 1
                        ]);
                }

                if($sel[0]->man_of_match == '0') {

                }
                else {
                        $motm2 = User::where('id', $sel[0]->man_of_match)->first();
                        User::where('id', $sel[0]->man_of_match)->update([
                            'motm' => $motm2->motm + 1
                        ]);
                        $rec_m2 = Record::where('user_id', $sel[0]->man_of_match)->where('team', $motm2->team)->first();
                        Record::where('user_id', $sel[0]->man_of_match)->where('team', $motm2->team)->update([
                            'motm' => $rec_m2->motm + 1
                        ]);
                        $sea_m2 = Seasonstat::where('user_id', $sel[0]->man_of_match)->first();
                        Seasonstat::where('user_id', $sel[0]->man_of_match)->update([
                            'motm' => $sea_m2->motm + 1
                        ]);
                }
                
                
                Pstat_temp::where('fixture_id', $request->fixture_id)->delete();
                Pgame::where('fixture_id', $request->fixture_id)->delete();
                return 'success';
            }
            else {
                $fix = Pfixture::where('id', $request->fixture_id)->first();
                if(Auth::user()->team == $fix->home) {
                    $side = 'home';
                }
                else {
                    $side = 'away';
                }
                $check = Pstat_temp::create([
                    'fixture_id' => $request->fixture_id,
                    'manager_id' => Auth::User()->id,
                    'side' => $side,
                    'goal' => $request->goal,
                    'assist' => $request->assist,
                    'man_of_match' => $request->man_of_match,
                    'yellow_card' => $request->yellow_card,
                    'red_card' => $request->red_card
                ]);
                return 'success';
            }
            
        } 
        else {
            $sel = Sstat_temp::where('fixture_id', $request->fixture_id)->where('manager_id', '!=',Auth::user()->id)->get();
            if(count($sel) > 0) {
                Sstat::create([
                    'fixture_id' => $request->fixture_id,
                    'manager_id' => Auth::User()->id,
                    'goal' => $request->goal,
                    'assist' => $request->assist,
                    'man_of_match' => $request->man_of_match,
                    'yellow_card' => $request->yellow_card,
                    'red_card' => $request->red_card
                ]);

                Sstat::create([
                    'fixture_id' => $sel[0]->fixture_id,
                    'manager_id' => $sel[0]->manager_id,
                    'goal' => $sel[0]->goal,
                    'assist' => $sel[0]->assist,
                    'man_of_match' => $sel[0]->man_of_match,
                    'yellow_card' => $sel[0]->yellow_card,
                    'red_card' => $sel[0]->red_card
                ]);

                if($request->goal != "" && $request->goal != "0") {
                    $array1 = explode(' ', $request->goal);
                    $goal1 = array_count_values($array1);
                    foreach ($goal1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'goal' => $user1->goal + $value
                        ]);
                        $rec_g1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'goals' => $rec_g1->goals + $value
                        ]);
                        $sea_g1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'goals' => $sea_g1->goals + $value
                        ]);
                    }
                }
                
                if($sel[0]->goal != "" && $sel[0]->goal != "0") {
                    $array2 = explode(' ', $sel[0]->goal);
                    $goal2 = array_count_values($array2);
                    foreach ($goal2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'goal' => $user2->goal + $value
                        ]);
                        $rec_g2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'goals' => $rec_g2->goals + $value
                        ]);
                        $sea_g2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'goals' => $sea_g2->goals + $value
                        ]);
                    }
                }

                if($request->assist != "" && $request->assist != "0") {
                    $array3 = explode(' ', $request->assist);
                    $assist1 = array_count_values($array3);
                    foreach ($assist1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'assist' => $user1->assist + $value
                        ]);
                        $rec_a1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'assists' => $rec_a1->assists + $value
                        ]);
                        $sea_a1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'assists' => $sea_a1->assists + $value
                        ]);
                    }
                }
                
                if($sel[0]->assist != "" && $sel[0]->assist != "0") {
                    $array4 = explode(' ', $sel[0]->assist);
                    $assist2 = array_count_values($array4);
                    foreach ($assist2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'assist' => $user2->assist + $value
                        ]);
                        $rec_a2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'assists' => $rec_a2->assists + $value
                        ]);
                        $sea_a2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'assists' => $sea_a2->assists + $value
                        ]);
                    }
                }
                if($request->yellow_card == '0') {
                    
                }
                else {
                    $array5 = explode(' ', $request->yellow_card);
                    $yellow1 = array_count_values($array5);
                    foreach ($yellow1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'yellow' => $user1->yellow + $value
                        ]);
                        $rec_y1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'yellow' => $rec_y1->yellow + $value
                        ]);
                        $sea_y1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'yellow' => $sea_y1->yellow + $value
                        ]);
                    }
                }

                if($sel[0]->yellow_card == '0') {
                    
                }
                else {
                    $array6 = explode(' ', $sel[0]->yellow_card);
                    $yellow2 = array_count_values($array6);
                    foreach ($yellow2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'yellow' => $user2->yellow + $value
                        ]);
                        $rec_y2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'yellow' => $rec_y2->yellow + $value
                        ]);
                        $sea_y2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'yellow' => $sea_y2->yellow + $value
                        ]);
                    }
                }
                
                if($request->red_card == '0') {

                }
                else {
                    $array7 = explode(' ', $request->red_card);
                    $red1 = array_count_values($array7);
                    foreach ($red1 as $key => $value) {
                        $user1 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'red' => $user1->red + $value
                        ]);
                        $rec_r1 = Record::where('user_id', $key)->where('team', $user1->team)->first();
                        Record::where('user_id', $key)->where('team', $user1->team)->update([
                            'red' => $rec_r1->red + $value
                        ]);
                        $sea_r1 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'red' => $sea_r1->red + $value
                        ]);
                    }
                }

                if($sel[0]->red_card == '0') {
                    
                }
                else {
                    $array8 = explode(' ', $sel[0]->red_card);
                    $red2 = array_count_values($array8);
                    foreach ($red2 as $key => $value) {
                        $user2 = User::where('id', $key)->first();
                        User::where('id', $key)->update([
                            'red' => $user2->red + $value
                        ]);
                        $rec_r2 = Record::where('user_id', $key)->where('team', $user2->team)->first();
                        Record::where('user_id', $key)->where('team', $user2->team)->update([
                            'red' => $rec_r2->red + $value
                        ]);
                        $sea_r2 = Seasonstat::where('user_id', $key)->first();
                        Seasonstat::where('user_id', $key)->update([
                            'red' => $sea_r2->red + $value
                        ]);
                    }
                }

                if($request->man_of_match == '0') {

                }
                else {
                        $motm1 = User::where('id', $request->man_of_match)->first();
                        User::where('id', $request->man_of_match)->update([
                            'motm' => $motm1->motm + 1
                        ]);
                        $rec_m1 = Record::where('user_id', $request->man_of_match)->where('team', $motm1->team)->first();
                        Record::where('user_id', $request->man_of_match)->where('team', $motm1->team)->update([
                            'motm' => $rec_m1->motm + 1
                        ]);
                        $sea_m1 = Seasonstat::where('user_id', $request->man_of_match)->first();
                        Seasonstat::where('user_id', $request->man_of_match)->update([
                            'motm' => $sea_m1->motm + 1
                        ]);
                }

                if($sel[0]->man_of_match == '0') {

                }
                else {
                        $motm2 = User::where('id', $sel[0]->man_of_match)->first();
                        User::where('id', $sel[0]->man_of_match)->update([
                            'motm' => $motm2->motm + 1
                        ]);
                        $rec_m2 = Record::where('user_id', $sel[0]->man_of_match)->where('team', $motm2->team)->first();
                        Record::where('user_id', $sel[0]->man_of_match)->where('team', $motm2->team)->update([
                            'motm' => $rec_m2->motm + 1
                        ]);
                        $sea_m2 = Seasonstat::where('user_id', $sel[0]->man_of_match)->first();
                        Seasonstat::where('user_id', $sel[0]->man_of_match)->update([
                            'motm' => $sea_m2->motm + 1
                        ]);
                }
                Sstat_temp::where('fixture_id', $request->fixture_id)->delete();
                Sgame::where('fixture_id', $request->fixture_id)->delete();
                return 'success';
            }
            else {
                $check = Sstat_temp::create([
                    'fixture_id' => $request->fixture_id,
                    'manager_id' => Auth::User()->id,
                    'goal' => $request->goal,
                    'assist' => $request->assist,
                    'man_of_match' => $request->man_of_match,
                    'yellow_card' => $request->yellow_card,
                    'red_card' => $request->red_card
                ]);
                return 'success';
            }
        }
    }

    public function enter_stat($fixture_id) {
        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
        $users = User::where(['role' => 'user','team' => Auth::User()->team])->get();
        if(Auth::User()->league == 'premier') {
            $stat = Pgame::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->first();
            if($stat->home == Auth::User()->team) {

                $score = Pgame::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->pluck('home_score')->first();
            }
            else {
                $score = Pgame::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->pluck('away_score')->first();
            }
            $check = Pstat_temp::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->get();
        }
        else {
            $stat = Sgame::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->first();
            if($stat->home == Auth::User()->team) {

                $score = Sgame::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->pluck('home_score')->first();
            }
            else {
                $score = Sgame::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->pluck('away_score')->first();
            }
            $check = Sstat_temp::where('fixture_id', $fixture_id)->where('manager_id', Auth::user()->id)->get();
        }
        
        return view('manager.enter_stat', compact('shouts', 'new_messages', 'score', 'users', 'fixture_id', 'check'));
    }

    public function choose_date() {
        $manager = User::where('id', Auth::User()->id)->get();
        $team = $manager[0]->team;
        $users = User::where(['role' => 'user','team' => $team])->get();
        $GLOBALS['team'] = $team;

        if($manager[0]->league == 'premier') {
            $game = count(Pfixture::where('home', Auth::User()->team)->orWhere('away', Auth::User()->team)->get());
            $check = Pgame::where('manager_id', Auth::User()->id)->get();
            if(count($check) > 0) {
                $fixs = "";
            }
            else {
                $fixs = Pfixture::where(function($query) {
                    $query->where(['home' => Auth::User()->team, 'home_score' => NULL, 'void' => 0]);
                })->orWhere(function($query) {
                    $query->where(['away' => Auth::User()->team, 'away_score' => NULL, 'void' => 0]);
                })->limit(3)->get();
            }
            
        }
        else{
            $game = count(Sfixture::where('home', Auth::User()->team)->orWhere('away', Auth::User()->team)->get());
            $check = Sgame::where('manager_id', Auth::User()->id)->get();
            if(count($check) > 0) {
                $fixs = "";
            }
            else {
                $fixs = Sfixture::where(function($query) {
                    $query->where(['home' => $GLOBALS['team'], 'home_score' => NULL, 'void' => 0]);
                })->orWhere(function($query) {
                    $query->where(['away' => $GLOBALS['team'], 'away_score' => NULL, 'void' => 0]);
                })->limit(3)->get();
            }
        }

        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }

        return view('manager.choose_date', compact('users', 'shouts', 'new_messages', 'fixs', 'game'));
    }

    public function games_week(Request $request) {
        if(Auth::User()->league == 'premier') {
            $check = Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->get();
            if(count($check) == 0) {

                $pgame = Pgame::create([
                    'home' => $request->home,
                    'fixture_id' => $request->fixture_id,
                    'away' => $request->away,
                    'date' => $request->date.' 19:30:00'.'',
                    'manager_id' => Auth::User()->id,
                    'day' => $request->day
                ]);
                return 'Date fixed';
            }
            else{
                return 'Match already fixed';
            }
        }
        else {
            $check = Sgame::where('fixture_id', $request->fixture_id)->where('manager_id', Auth::User()->id)->get();
            if(count($check) == 0) {

                $pgame = Sgame::create([
                    'home' => $request->home,
                    'fixture_id' => $request->fixture_id,
                    'away' => $request->away,
                    'date' => $request->date.' 19:30:00'.'',
                    'manager_id' => Auth::User()->id,
                    'day' => $request->day
                ]);
                return 'Date fixed';
            }
            else{
                return 'Match already fixed';
            }
        }
        
       
    }

    public function next_match() {
        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
        $manag = "";
        $msg2 = "";
        $manager = User::where('id', Auth::User()->id)->get();
        if($manager[0]->league == 'premier') {
            $match2 = count(Pgame::where('manager_id', Auth::User()->id)->where('void', 0)->get());
            if($match2 > 0) {
                $match = Pgame::where('manager_id', Auth::User()->id)->where('void', 0)->first();
                $other = Pgame::where('fixture_id', $match->fixture_id)->where('manager_id', '!=', Auth::User()->id)->first();
                $check = count(Pgame::where('fixture_id', $match->fixture_id)->where('manager_id', '!=', Auth::User()->id)->get());
                if($check > 0) {
                    if($match->date ==
                     $other->date) {
                        $msg1 = 'Match Fixed to same day';
                    }
                    else {
                        $manag = User::where('id', $other->manager_id)->first();
                        $msg1 = "Inbox";
                        $msg2 = "to fixed a new day to play the match";
                    }
                }
                return view('manager.next_match', compact('shouts', 'new_messages', 'match', 'match2', 'other', 'msg1', 'msg2', 'manag', 'check'));
            }
            return view('manager.next_match', compact('shouts', 'new_messages', 'match2', 'other', 'msg1', 'msg2', 'manag', 'check'));
            
        }
        else{
            $match2 = count(Sgame::where('manager_id', Auth::User()->id)->where('void', 0)->get());
            if($match2 > 0) {
                $match = Sgame::where('manager_id', Auth::User()->id)->where('void', 0)->first();
                $other = Sgame::where('fixture_id', $match->fixture_id)->where('manager_id', '!=', Auth::User()->id)->first();
                $check = count(Sgame::where('fixture_id', $match->fixture_id)->where('manager_id', '!=', Auth::User()->id)->get());
                if($check > 0) {
                    if($match->date ==
                     $other->date) {
                        $msg1 = 'Match Fixed to same day';
                    }
                    else {
                        $manag = User::where('id', $other->manager_id)->first();
                        $msg1 = "Inbox";
                        $msg2 = "to fixed a new day to play the match";
                    }
                }
                return view('manager.next_match', compact('shouts', 'new_messages', 'match', 'match2', 'other', 'msg1', 'msg2', 'manag', 'check'));
            }
            return view('manager.next_match', compact('shouts', 'new_messages', 'match2', 'other', 'msg1', 'msg2', 'manag', 'check'));
        }

        
    }

    public function edit_day(Request $request) {
        $manager = User::where('id', Auth::User()->id)->get();
        if($manager[0]->league == 'premier') {
            Pgame::where('id', $request->id)->update([
                'date' => $request->date,
                'day' => $request->day
            ]);
            return 'success';
        }
        else {
            Sgame::where('id', $request->id)->update([
                'date' => $request->date,
                'day' => $request->day
            ]);
            return 'success';
        }
    }

    public function void(Request $request) {
        $manager = User::where('id', Auth::User()->id)->get();
        if($manager[0]->league == 'premier') {
            
            $me = Pgame::where('manager_id', Auth::User()->id)->where('fixture_id', $request->fixture_id)->get();
            $che = Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', '!=', Auth::User()->id)->get();
            if(count($che) > 0) {
                Pvoid::create([
                    'fixture_id' => $me[0]->fixture_id,
                    'manager_id' => $me[0]->manager_id,
                    'home' => $me[0]->home,
                    'away' => $me[0]->away,
                    'home_score' => $me[0]->home_score,
                    'away_score' => $me[0]->away_score,
                    'date' => $me[0]->date
                ]);
                Pvoid::create([
                    'fixture_id' => $che[0]->fixture_id,
                    'manager_id' => $che[0]->manager_id,
                    'home' => $che[0]->home,
                    'away' => $che[0]->away,
                    'home_score' => $che[0]->home_score,
                    'away_score' => $che[0]->away_score,
                    'date' => $che[0]->date
                ]);
                Pgame::where('fixture_id', $request->fixture_id)->delete();

                Pfixture::where('id', $request->fixture_id)->update([
                    'void' => 1
                ]);

                return 'match void';
            }  
            
        }
        else {
            $me = Pgame::where('manager_id', Auth::User()->id)->where('fixture_id', $request->fixture_id)->get();
            $che = Pgame::where('fixture_id', $request->fixture_id)->where('manager_id', '!=', Auth::User()->id)->get();
            if(count($che) > 0) {
                Pvoid::create([
                    'fixture_id' => $me[0]->fixture_id,
                    'manager_id' => $me[0]->manager_id,
                    'home' => $me[0]->home,
                    'away' => $me[0]->away,
                    'home_score' => $me[0]->home_score,
                    'away_score' => $me[0]->away_score,
                    'date' => $me[0]->date
                ]);
                Pvoid::create([
                    'fixture_id' => $che[0]->fixture_id,
                    'manager_id' => $che[0]->manager_id,
                    'home' => $che[0]->home,
                    'away' => $che[0]->away,
                    'home_score' => $che[0]->home_score,
                    'away_score' => $che[0]->away_score,
                    'date' => $che[0]->date
                ]);
                Pgame::where('fixture_id', $request->fixture_id)->delete();

                Pfixture::where('id', $request->fixture_id)->update([
                    'void' => 1
                ]);

                return 'match void';
            }
        }
    }

    public function void_match() {
        $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }

        if(Auth::User()->league = 'premier') {
            $voids = Pvoid::where('manager_id', Auth::User()->id)->get();
        }
        else {
            $voids = Svoid::where('manager_id', Auth::User()->id)->get();
        }
        return view('manager.void_match', compact('shouts', 'new_messages', 'voids'));
    }
}
