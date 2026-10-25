<?php
namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

    class MessageController extends Controller
    {
        public function create()
        {
            return view('messages.create');
        }
        public function store(Request $request)
        {
            $data = $request->validate([
        'content' => 'required|string',
        ]);
    $data['user_id'] = $request->user()->id;
        Message::create($data);
        return redirect('/messages')-> with('success', 'Message Saved');
        }
        public function index(Request $request)
    {
         
        $messages = Message::where('user_id', $request->user()->id)->get();
        return view('messages.index', ['messages' => $messages]);
    }
    }
