<?php
namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Services\MessageAnalyzer;

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
    $analysis = (new MessageAnalyzer)->analyze($data['content']);
    if (in_array($analysis['category'] ?? null, ['complaint', 'inquiry', 'purchase'], true)) {
    $data['category'] = $analysis['category'];
}
if (in_array($analysis['priority'] ?? null, ['normal', 'urgent'], true)) {
    $data['priority'] = $analysis['priority'];
}
if (is_string($analysis['summary'] ?? null)) {
    $data['summary'] = mb_substr($analysis['summary'], 0, 255);
}
if (is_string($analysis['suggested_reply'] ?? null)) {
    $data['suggested_reply'] = $analysis['suggested_reply'];
}
        Message::create($data);
        return redirect('/messages')-> with('success', 'Message Saved');
        }
        public function index(Request $request)
    {
         
        $messages = Message::where('user_id', $request->user()->id)->get();
        return view('messages.index', ['messages' => $messages]);
    }
    }
