<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\Reply;
use App\Forum;
use App\Shout;
use DB;
use App\Sender;

class ForumController extends Controller
{
    public function index() {
        $cats = Forum::all(); 
        $shouts = Shout::get();

        if(!Auth()->guest()) {

        
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('forum.index', compact('shouts', 'cats', 'new_messages'));
        }
        else {
            return view('forum.index', compact('cats', 'shouts'));
        }

        
    }

    public function general($id) {
    	$posts = Post::where('forum_id', $id)->paginate(10);
        $cat = Forum::where('id', $id)->get();
        $shouts = Shout::get();

        if(!Auth()->guest()) {

        
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('forum.general', compact('posts', 'id', 'cat', 'shouts', 'new_messages'));
        }
        else {
            return view('forum.general', compact('posts', 'id', 'cat', 'shouts'));
        }


    	
    }

    public function generalTopic($id) {
    	$post = Post::where('id', $id)->get();
        $cat = Forum::where('id', $post[0]->forum_id)->get();
    	$comments = Comment::where('post_id', $id)->get();
        $replies =Reply::where('post_id', $id)->get();
        $shouts = Shout::get();

        if(!Auth()->guest()) {

        
            $new_messages = 0;
            $senders = Sender::where('receiver_id', Auth()->user()->id)->get();
            foreach($senders as $sender) {
                $new_messages += $sender->new;
            }
            return view('forum.topic', compact('post', 'comments', 'relpies', 'cat', 'shouts', 'new_messages'));
        }
        else {
            return view('forum.topic', compact('post', 'comments', 'relpies', 'cat', 'shouts'));
        }
        

    	
    }

    public function inputComment(Request $request) {
        $input = Comment::create([
            'user_id' => Auth::User()->id,
            'post_id' => $request->post_id,
            'forum_id' => $request->forum_id,
            'user_id' => $request->Auth()->user()->id,
            'body' => $request->body,
        ]);
        return $request->all();
    }

    public function inputReply(Request $request) {
        $input = Reply::create([
            'user_id' => Auth::User()->id,
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
            'body' => $request->body,
        ]);
        return $request->all();
    }

    public function postInput(Request $request) {
        $input = Post::create([
            'user_id' => Auth::User()->id,
            'forum_id' => $request->forum_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return $request->all();
    }

    public function search_topic($topic) {
        $posts = Post::where('title', 'LIKE', '%'.$topic.'%')->get();
        return $posts;
    }
}
