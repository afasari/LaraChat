<?php

namespace App\Http\Controllers;
use DB;
use App\Admin;
use App\Word;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(('auth'||'auth:admin'));
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }


    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $words = Word::all();
        $word = $words->pluck('words');
        $pesan = $request->input('message');
        $valid = true;
        foreach($word as $words)
        {
            if(strpos($pesan, $words) !== false)
            {
                $valid = false;
                $pesan = "contain cencored word";
            }
        }
        
        $message = $user->messages()->create([
            'recipient_id' => '1',
            'message' => $pesan
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
    

    public function adminsendMessage(Request $request)
    {
        $user = Auth::admin();

        $message = $user->adminmessages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
