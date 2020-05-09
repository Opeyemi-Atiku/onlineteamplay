<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
use App\Pfixture;
use App\Sfixture;
use App\Tran;
use App\Record;
use App\Seasonstat;

class PagesController extends Controller
{
    public function index() {

    }

    public function team($league, $team_name) {
        if($league == 'premier') {
            $team = Premier::select('*')->where('team_name', $team_name)->get();
            $team_id = $team[0]->id;

            $teams_users = Premier_user::where('premier_id', $team_id)->get();
      
            
        }
        else {
            $team = Super::select('*')->where('team_name', $team_name)->get();
            $team_id = $team[0]->id;

            $teams_users = Super_user::where('super_id', $team_id)->get();
        }
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $top_scorer = User::where(['team' => $team_name, 'role' => 'user'])->orWhere('role', 'manager')->orderBy('goal', 'DESC')->first();
        $top_assister = User::where(['team' => $team_name, 'role' => 'user'])->orWhere('role', 'manager')->orderBy('assist', 'DESC')->first();
        if(!Auth()->guest()) {

        
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.team', compact('shouts', 'teams_users', 'league', 'new_messages', 'team', 'top_scorer', 'top_assister'));
        }

        else {
            return view('pages.team', compact('shouts', 'teams_users', 'league', 'team', 'top_scorer', 'top_assister'));
        }
        
        
    }

    public function reply_to_ticket(Request $request) {
       if($request->attachment->getClientOriginalName() !== ''){

            $file = $request->attachment->getClientOriginalName();

            $filename_without_extension = pathinfo($file, PATHINFO_FILENAME);

            $extension = $request->attachment->getClientOriginalExtension();

            $filename_to_store = $filename_without_extension.'_'.time().'.'.$extension;

            $path = $request->attachment->move('attachments/', $filename_to_store);
            
            Ticket_response::create([
                'user_id' => Auth()->user()->id,
                'ticket_id' => $request->ticket_id,
                'message' => $request->reply,
                'attachment' => 'attachments/'.$filename_to_store
            ]);

        }
        else {
            Ticket_response::create([
                'user_id' => Auth()->user()->id,
                'ticket_id' => $request->ticket_id,
                'message' => $request->message
            ]);
        }

        return redirect()->back()->with('success', 'Your reply has been successfully sent');

        
    }

    public function workspace() {
        $data = 'one two two two three three three ';
        $array = explode(' ', $data);
        print_r(array_count_values($array));

        // $counter = 0;
        // foreach($array as $value)
        // {
        //     if($value === $value) {
        //         $counter++;
        //     }

        //     echo $value.' occurred '.$counter.' times<br>';
            
            
            
        // }

        
        
        die();
        $paid = Tran::where('user_id', Auth()->user()->id)->first();
        // return $paid->created_at;
        $subscribed = date_create($paid->created_at);
        $today = date_create(date("Y-m-d"));
        $diff=date_diff($subscribed, $today);
        $the_diff = $diff->format("%a");

        if($the_diff <= 30) {
            User::where('id', Auth()->user()->id)->update(['subscribed' => true]);
        }
        
        die();
        // $data = file_get_contents('C:/xampp/htdocs/gaming/data2.json');
        // $fixtures = json_decode($data, true);
        // foreach($fixtures['rounds'] as $fixture) {
        //     foreach($fixture['matches'] as $match) {
        //         Sfixture::create([
        //             'home' => $match['team1']['name'],
        //             'away' => $match['team2']['name']
        //         ]);
        //         // echo $match['team1']['name'].' VS '.$match['team2']['name'].'<br>';

        //     }
            
        // }
        echo 'done';
        die();
        // $premiers = Premier::all();
        // foreach($premiers as $premier) {
        //     echo "'".$premier->team_name."', ";
        // }
        // return 0;
        $items = ['Manchester City', 'Chelsea', 'Watford', 'Tottenham', 'Bournemouth', 'Everton', 'Liverpool', 'Crystal Palace', 'Leicester City', 'Manchester United', 'Brighton', 'Newcastle', 'Southampton', 'Wolves', 'Burnley FC', 'Cardiff City', 'Arsenal', 'Fulham', 'West Ham', 'Huddersfield'];
        $fixtures = array();
        $previous_home = '';
        $previous_away = '';
        foreach($items as $item) {
            
            //get the index of each item;
            $current_item_index = array_search($item, $items);
            for($i=0; $i<20; $i++) {
                if($i != $current_item_index) {
                    // echo $item.' vs '.$items[$i].'<br>';
                    $data = $item.' vs '.$items[$i];
                    array_push($fixtures, $data);
                }
            }

        }

        // $data = shuffle($fixtures);
        return view('pages.dummy', compact('fixtures'));
        
    }

    public function members() {
        $users = User::where('role', 'user')->orWhere('role', 'manager')->get();
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        if(!Auth()->guest()) {
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.members', compact('shouts', 'new_messages', 'users'));
        }
        else {
            return view('pages.members', compact('shouts', 'users'));
        }
    }

    public function search_users($gamertag) {

        $users = User::where('username', 'LIKE', '%'.$gamertag.'%')->where('role', 'user')->orWhere('role', 'manager')->get();

        return $users;
    }

    public function send_message(Request $request) {
      
       /*Sender id is the id of the user sending the message, 

       sender_id is denoted as user_id for relationship 
       it is also the id of the currently logged in user
       
       Receiver id is the id of the user receiving the message and not he the logged in user

       The logic below is thus, Check if the user sending the message has previously 
       sent a message to the same receipent before. this is done by checking if there is more
       than zero record in the senders table. if yes the new and last_message column is updated.
       and if no a new record is created with the necessary data.
        */
        $message = Message::create([
            'message' => $request->message,
            'sender_id' => Auth()->user()->id,
            'receiver_id' => $request->receiver_id,
            'new' => true
        ]);
        
        $sender = sender::where(['user_id' => $request->sender_id, 'receiver_id' => $request->receiver_id])->get();
    
        if($sender->count() < 1) {
           
          
            Sender::create([
                'user_id' => Auth()->user()->id,
                'receiver_id' => $request->receiver_id,
                'new' => 1,
                'last_message' => $request->message
            ]);
        }
        else {
            Sender::where(['user_id' => auth()->user()->id, 'receiver_id' => $request->receiver_id])->update([
                'new' => $sender[0]->new + 1,
                'last_message' => $request->message
            ]);
        }

        return ['created_at' => $message->created_at->diffforhumans(), 'message' => $message->message];
            

    }

    public function send_user_message(Request $request) {
        
        /*Sender id is the id of the user sending the message, 
 
        sender_id is denoted as user_id for relationship 
        it is also the id of the currently logged in user
        
        Receiver id is the id of the user receiving the message and not he the logged in user
 
        The logic below is thus, Check if the user sending the message has previously 
        sent a message to the same receipent before. this is done by checking if there is more
        than zero record in the senders table. if yes the new and last_message column is updated.
        and if no a new record is created with the necessary data.
         */
         $message = Message::create([
             'message' => $request->message,
             'sender_id' => Auth()->user()->id,
             'receiver_id' => $request->receiver_id,
             'new' => true
         ]);
         
         $sender = sender::where(['user_id' => $request->sender_id, 'receiver_id' => $request->receiver_id])->get();
     
         if($sender->count() < 1) {
            
           
             Sender::create([
                 'user_id' => Auth()->user()->id,
                 'receiver_id' => $request->receiver_id,
                 'new' => 1,
                 'last_message' => $request->message
             ]);
         }
         else {
             Sender::where(['user_id' => auth()->user()->id, 'receiver_id' => $request->receiver_id])->update([
                 'new' => $sender[0]->new + 1,
                 'last_message' => $request->message
             ]);
         }

         return redirect()->back()->with(['success' => 'Message successfully sent to user!!']);
 
         
             
 
     }

     public function fetch_messages($receiver_id, $sender_id) {
        
        $GLOBALS['sender_id'] = $sender_id;
        $messages = Message::where(function($query) {
            $query->where(['sender_id' => $GLOBALS['sender_id']])->where('receiver_id', Auth()->User()->id);
        })->orWhere(function($query) {
            $query->where('sender_id', Auth()->User()->id)->where(['receiver_id' => $GLOBALS['sender_id']]);
        })->get();

        Sender::where('user_id', $sender_id)->update(['new' => 0]);
        return $messages;
    }

    public function support() {
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $tickets = Ticket::where('user_id', Auth()->user()->id)->get();
        $new_messages = 0;
        if(!Auth()->guest()) {
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.support', compact('shouts', 'new_messages', 'tickets'));
        }
        else {
            return view('pages.support', compact('shouts', 'tickets'));
        }
    }

    public function ticket($ticket_id) {
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
            
        $ticket = Ticket::where('id', $ticket_id)->get();
        $ticket_responses = Ticket_response::where('ticket_id', $ticket_id)->orderBy('created_at')->get();
        
        return view('pages.ticket', compact('shouts', 'new_messages', 'ticket', 'ticket_responses', 'ticket_id'));
    }

    public function search_user($gamertag) {
        $users = User::where('username', 'LIKE', '%'.$gamertag.'%')->get();
        return $users;
    }


    public function create_ticket(Request $request) {
        Ticket::create([
            'title' => $request->title,
            'open' => true,
            'description' => $request->description,
            'user_id' => Auth()->user()->id
        ]);

        return redirect()->back()->with('success', 'Ticket succesfully created, and can be seen in the tickets tab');


    }
    public function forum() {
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        return view('pages.forum', compact('shouts'));
    }

    public function table($league) {
        if($league == 'premier') {
            $points = Premier::select('PTS')->max('PTS');
            if($points > 1) {
               $teams = Premier::orderBy('PTS', 'DESC')->get();
            }
            else {
                $teams = Premier::orderBy('team_name')->get();
            }
                
        }
        else {
            $points = Super::select('PTS')->max('PTS');
            if($points > 1) {
                $team = Super::orderBy('PTS', 'DESC')->get();
            }
            else {
                $teams = Super::orderBy('team_name')->get();
            }
            
        }
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        if(!Auth()->guest()) {
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.table', compact('shouts', 'league', 'teams', 'new_messages'));
        }
        else {
            return view('pages.table', compact('shouts', 'league', 'teams'));
        }
            
        
        
    }

    public function handle_contract($type, $contract_id) {
        if($type == 'accept') {
            $contract = Contract::where('id', $contract_id)->get();
            
            $user = User::where('id', $contract[0]->user_id)->update([
                'free' => false,
                'team' => $contract[0]->team,
                'league' => $contract[0]->league
            ]);

            Record::create([
                'user_id' => $contract[0]->user_id,
                'team' => $contract[0]->team
            ]);

            

            
            
            if($contract[0]->league == 'premier') {
                $premier = Premier::where('team_name', $contract[0]->team)->get();
                Premier_user::create([
                    'premier_id' => $premier[0]->id,
                    'user_id' => Auth()->user()->id 
                ]);
            }

            if($contract[0]->league == 'super') {
                $super = Super::where('team_name', $contract[0]->team)->get();
                Super_user::create([
                    'super_id' => $super[0]->id,
                    'user_id' => Auth()->user()->id 
                ]);
            }
            

            Contract::where('id', $contract_id)->delete();
            return "accepted";

        }
        else {

            Contract::where('id', $contract_id)->delete();
            return 'rejected';

        }
    }

    public function inbox() {
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        $contracts = Contract::where('user_id', Auth()->user()->id)->get();
        
        if(!Auth()->guest()) {
            $new_messages = 0;
                    
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.inbox', compact('shouts', 'senders', 'contracts', 'new_messages'));
        }
        else {
            return view('pages.inbox', compact('shouts', 'senders', 'contracts'));
        }
            
    }

    public function free_agents() {

        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $free_agents = User::where(['role' => 'user','free'=> true])->get();
     

        if(!Auth()->guest()) {
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.free-agents', compact('free_agents', 'shouts', 'new_messages'));
        }

        else {
            return view('pages.free-agents', compact('free_agents', 'shouts'));
        }
    }

    public function apply(Request $request) {

        $application = Application::where(['user_id' => Auth()->user()->id])->get();

        if($application->count() == 0) {
            Application::create([
                'user_id' => Auth()->user()->id,
                'team' => $request->team,
                'league' => $request->league
            ]);

            return redirect('/home')->with('success', 'You have successfully applied for managerial role!!');

        }
        else {
            return redirect()->back()->with('error', 'You have already applied for managerial role a team!!');
        }
        


    }

    public function become_a_manager() {
        if(Auth()->user()->role == 'manager') {
            return redirect()->back();
        }
        $premiers = Premier::where('manager_id', '==', '0')->get();
        $supers = Super::where('manager_id', '==', '0')->get();
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();

        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
        return view('pages.application', compact('shouts', 'new_messages', 'premiers', 'supers'));
        
    }

    public function offer_contract($manager_id, $user_id, $week) {

        //User_id is the id of the manager
        $contract = Contract::where(['manager_id' => $manager_id, 'user_id' => $user_id])->get();
        if(count($contract) == 0) {
            $manager = Manager::where('user_id', $manager_id)->get();
            Contract::create([
                'manager_id' => $manager_id,
                'team' => $manager[0]->team,
                'league' => $manager[0]->league,
                'week' => $week,
                'user_id' => $user_id
            ]);

            return back()->with('success', 'Contract sent');
        }
        else{
            return back()->with('success', 'Contract already sent: Awaiting response');
        }
    }

    public function profile($gamertag) {
        //gamertag is username on the database
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $user = User::select('*')->where('username', $gamertag)->get();
        $records = Record::where('user_id', Auth()->user()->id)->get();
        if(!Auth()->guest()) {
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('pages.user', compact('user', 'shouts', 'new_messages', 'records'));
        }
        else {
            return view('pages.user', compact('user', 'shouts', 'records'));
        }
    }

    public function edit_profile() {
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
        return view('pages.edit', compact('shouts', 'new_messages'));
    }

    public function edit(Request $request) {
        if($request->hasFile('avatar')) {

            // unlink('/images/'.Auth()->user()->avatar);
            
            $file = $request->avatar->getClientOriginalName();

            $filename_without_extension = pathinfo($file, PATHINFO_FILENAME);

            $extension = $request->avatar->getClientOriginalExtension();

            $filename_to_store = $filename_without_extension.'_'.time().'.'.$extension;

            $path = $request->avatar->move('images/', $filename_to_store);

            User::where('id', Auth()->user()->id)->update([
                'username' => $request->gamertag,
                'email' => $request->email,
                'bio' => $request->bio,
                'name' => $request->name,
                'avatar' => $filename_to_store
            ]);

        
        }
        else {
            User::where('id', Auth()->user()->id)->update([
                'username' => $request->gamertag,
                'bio' => $request->bio,
                'email' => $request->email,
                'name' => $request->name
            ]); 
        }
        
        return redirect()->back()->with('success', 'Profile edited successfuly');

    }

    public function edit_pass(Request $request) {

        if(Hash::check($request->old_password, Auth()->user()->password)) {
                if($request->new_password == $request->password_confirmation) {
                    User::where('id', auth()->user()->id)->update([
                    'password' => bcrypt($request->new_password)
                ]);
                    return back()->with('success', 'Password successfully changed');
                }
                else {
                    return back()->with('success', 'Passwords do not match!!');
                }

            }
            else {
                return back()->with('success', 'Invalid password!!');
            }
    }

    public function fill_up() {
        // $teams = [ 'Real Madrid', 'Barcelona', 'Atlético Madrid', 'Sevilla', 'Valencia', 'Juventus', 'AC Milan', 'Inter', 'Napoli', 'Roma', 'Lazio', 'Bayern Munich', 'Borussia Dortmund', 'Schalke', 'PSG', 'Lyon', 'Zenit', 'Porto', 'Benfica', 'Besiktas'];
        // $teams = ['Manchester City', 'Chelsea', 'Watford', 'Tottenham', 'Bournemouth', 'Everton', 'Liverpool', 'Crystal Palace', 'Leicester City', 'Manchester United', 'Brighton', 'Newcastle', 'Southampton', 'Wolves', 'Burnley FC', 'Cardiff City', 'Arsenal', 'Fulham', 'West Ham', 'Huddersfield'];
        // foreach($teams as $team) {
        //     Premier::create([
        //         'team_name' => $team,
        //         'GP' => 0,
        //         'W' => 0,
        //         'D' => 0,
        //         'L' => 0,
        //         'GF' => 0,
        //         'GA' => 0,
        //         'GD' => 0,
        //         'PTS' => 0
        //     ]);
        // }

        // $data = Super_user::find(1)->get();
        // return $data[0]->user;
    }

    public function shout(Request $request) {
        $shout = Shout::create([
            'shout' => $request->shout,
            'user_id' => Auth()->user()->id
        ]);

        return ['shout' => $shout->shout, 'time' => $shout->created_at->diffforhumans()];
    }

    public function myPlayers($id) {
        $manager = User::where('id', $id)->get();
        $team = $manager[0]->team;
        $users = User::where(['role' => 'user','team' => $team])->get();
        $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
        // return $users;
        return view('manager.myPlayers', compact('users', 'shouts'));
    }
}
