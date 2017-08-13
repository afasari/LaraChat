<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Admin;
use App\Word;
use App\Message;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
        public function word()
    {
        $words = Word::all();
        return view('admin.word',compact('words'));
    }
        
    public function wordCreate()
    {
        
        $words = Word::all();
        $word = $words->pluck('words');
        return view('admin.wordCreate',compact('word'));
        
    }
    public function wordStore(Request $request)
        {
        $words = new Word;
        $this->validate($request,[
            'words'=>'required|unique:words',
            ]);
        $words->words = $request->words;

        $words->save();
        return redirect('/admin/word');
        }

    public function wordEdit($id)
    {
        $words = Word::find($id);
        return view('admin.wordEdit',compact('words'));
    }

    public function wordShow()
    {
        $words = Word::all();
        $word = $words->pluck('words');
        // return $word;
        return view('admin.wordShow',compact('word'));
    }

    public function wordUpdate(Request $request, $id)
{
    $words = Word::find($id);
	$this->validate($request, [
		'words'=>'required',
	]);
	$words->words = $request->words;
	$words->save();
	return redirect('/admin/word');
}
    public function wordDelete($id)
    {
        $item = Word::find($id);
	$item->delete();
	return redirect('/admin/word');
    }





    public function update(Request $request, $id)
    {
    $users = User::find($id);
	$this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|min:6|confirmed',
	]);
    $users->name = $request->name;
    $users->email = $request->email;
    $users->password = bcrypt($request->password);
	$users->save();
	return redirect('/admin/manage');

    }
        public function manage()
    {
        $users = User::all();
	return view('admin.manage',compact('users'));
    }

        public function store(Request $request)
    {
        $users = new User;
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect('/admin/manage');
    }


    public function create()
    {
        return view('admin.create');
    }

    public function delete($id)
    {
        $item = User::find($id);
	$item->delete();
	return redirect('/admin/manage');
        
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {
        $item = User::find($id);
        return view('admin.edit',compact('item'));
        
    }

        public function conversation()
    {
        //
        // $userku = Auth::guard('admin');
        // $idku = $userku->id;
        
        $users = User::all();
        return view('admin.conversation',compact(['users'
        // ,'currentuser'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
         public function chat($id)
    {
        
        // $user = Auth::user();
        // $idku = $user->id;
        // $currentuser = User::find($idku);
        $pesan = Message::all();

        $conversation = User::find($id);
        return view('admin.chat',compact(['conversation','pesan']));
    }

        public function converstore(Request $request)
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
}
