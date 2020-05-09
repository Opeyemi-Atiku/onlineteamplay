<?php
use App\Shout;
use App\Sender;
use App\Sfixture;
use App\Pfixture;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $shouts = $shouts = Shout::orderBy('created_at', 'DESC')->get();
    $sfixtures = Sfixture::where('played', false)->limit(4)->get();
    $pfixtures = Pfixture::where('played', false)->limit(4)->get();

    $premier_results = Pfixture::where('played', true)->limit(5)->get();
    $super_results = Sfixture::where('played', true)->limit(5)->get();

    $top_scorers = User::where('role', 'user')->orderBy('goal', 'DESC')->limit(5)->get();
    $top_assisters = User::where('role', 'user')->orderBy('assist', 'DESC')->limit(5)->get();
    if(!Auth::guest()) {
        $new_messages = 0;
        $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
        foreach($senders as $sender) {
            $new_messages += $sender->new;
        }
        return view('welcome', compact('shouts', 'new_messages', 'pfixtures', 'sfixtures', 'premier_results', 'super_results', 'top_scorers', 'top_assisters'));
    }
    else {
        return view('welcome', compact('shouts', 'pfixtures', 'sfixtures', 'premier_results', 'super_results', 'top_scorers', 'top_assisters'));
    }
        
});

Route::get('/fill', 'PagesController@fill_up');

Route::get('/bcrypt', function () {
    return Hash::check(145081, 145081, []);
});

Route::get('/free-agents', 'PagesController@free_agents');

Route::get('/result/{league}/{id}', 'MatchController@result');

Route::get('/match/{league}/{id}', 'MatchController@match');


//ALL FORUM ROUTES

Route::get('/forum', 'ForumController@index');
Route::get('/forum/{id}', 'ForumController@general');
Route::get('/forum/details/{id}', 'ForumController@generalTopic');
Route::get('/inputComment', 'ForumController@inputComment');
Route::get('/inputReply', 'ForumController@inputReply');
Route::get('/search_topic/{topic}', 'ForumController@search_topic');
Route::get('/postInput', 'ForumController@postInput');
Route::get('/members', 'PagesController@members');
Route::get('/search-users/{gamertag}', 'PagesController@search_users');

Route::middleware(['auth'])->group(function () {

    

    Route::get('/offer-contract/{manager_id}/{user_id}/{week}', 'PagesController@offer_contract');

    Route::post('/apply', 'PagesController@apply');

    Route::get('/handle-contract/{type}/{contract_id}' , 'PagesController@handle_contract');

    Route::post('/edit_pass', 'PagesController@edit_pass');

    Route::get('/become-a-manager', 'PagesController@become_a_manager');

    Route::get('/edit-profile', 'PagesController@edit_profile');

    Route::post('/edit', 'PagesController@edit');

    Route::get('/inbox', 'PagesController@inbox');

    Route::post('/send-message', 'PagesController@send_message');

    Route::get('/fetch-messages/{receiver_id}/{sender_id}', 'PagesController@fetch_messages');

    Route::get('/search-user/{gamertag}', 'PagesController@search_user');

    Route::get('/support', 'PagesController@support');

    Route::get('/ticket/{ticket_id}', 'PagesController@ticket');

    Route::get('/my-players/{id}', 'ManagersController@my_players');

    Route::post('/send-user-message', 'PagesController@send_user_message');

    Route::get('/position', 'ManagersController@position');

    Route::get('/release/{id}', 'ManagersController@release');

    Route::post('/reply-to-ticket', 'PagesController@reply_to_ticket');

    Route::get('/my-players/{id}', 'ManagersController@my_players');

    Route::get('/submit_score', 'ManagersController@submit_score');

    Route::get('/score', 'ManagersController@score');

    Route::get('/enter_stat/{fixture_id}', 'ManagersController@enter_stat');

    Route::get('/stat', 'ManagersController@stat');

    Route::get('/choose_date', 'ManagersController@choose_date');

    Route::get('/games_week', 'ManagersController@games_week');

    Route::get('/void_match', 'ManagersController@void_match');

    Route::get('/next_match', 'ManagersController@next_match');

    Route::get('/edit_day', 'ManagersController@edit_day');

    Route::get('/void', 'ManagersController@void');



});

Route::get('/workspace', 'PagesController@workspace');
Route::get('/team/{league}/{team_name}', 'PagesController@team');
Route::get('/table/{league}', 'PagesController@table');
Route::get('/user/{gamertag}', 'PagesController@profile');
Route::post('/shout', 'PagesController@shout');

Route::post('/create-ticket', 'PagesController@create_ticket');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

Route::post('/paypal', 'PaymentController@payWithpaypal');
Route::get('/status', 'PaymentController@getPaymentStatus')->name('status');
