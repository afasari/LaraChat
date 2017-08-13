<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Word;
use App\Admin;
use App\Message;
use Illuminate\Http\Request;
use Auth;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(('auth'));
    }
    public function index()
    {
        //
        $user = Auth::user();
        $idku = $user->id;
        $currentuser = User::find($idku);
        $users = User::all();
        return view('conversation.manage',compact(['users','currentuser']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
         public function chat($id)
    {
        
        $user = Auth::user();
        $idku = $user->id;
        $currentuser = User::find($idku);
        $pesan = Message::all();

        // $idnya = Auth::user()->id;
        // $currentuser = User::find($idnya);
        // $usergroup = $currentuser->id;

        $conversation = User::find($id);
        return view('conversation.chat',compact(['conversation','currentuser','pesan']));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $words = Word::all();
        $word = $words->pluck('words');
        $pesan = $request->message;
        $valid = true;
        foreach($word as $words)
        {
            $pesan = str_replace($words, "*****", $pesan);
        }
        $chat = new Message;
        $this->validate($request,[
            'user_id' => 'required|max:255',
            'recipient_id' => 'required|max:255',
            'message' => 'required|max:255',
            ]);
        $chat->user_id = $request->user_id;
        $chat->recipient_id = $request->recipient_id;
        $chat->message = $pesan;
        $chat->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
