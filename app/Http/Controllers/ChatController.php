<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChMessage;

class ChatController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required|string',
            'from_id' => 'required|integer',
            'to_id' => 'required|integer',
        ]);

        // Create the chat message
        $chat = new ChMessage();
        $chat->body = $request->input('message');
        $chat->from_id = $request->input('from_id');
        $chat->to_id = $request->input('to_id');
        $chat->seen = false;
        $chat->created_at = now();
        $chat->save();

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
