<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function pharmacies()
    {
        $userId = Auth::id();
        // Fetch pharmacies (users where role is 0)
        $pharmacies = User::where('userType', 0)->get(['id', 'name']); // Adjust fields as per your user model
        $messages = ChMessage::where('to_id', $userId)->get();

        $data = [
            'pharmacies' => $pharmacies,
            'messages' => $messages,
        ];

        return response()->json($data);
    }

    public function getMessagesForPharmacy(Request $request, $pharmacyId)
    {
        // Get logged-in user (patient) ID
        $userId = Auth::id();

        // Fetch messages where from_id is the pharmacy and to_id is the logged-in user (patient)
        $psmessages = ChMessage::where('from_id', $pharmacyId)
                            ->where('to_id', $userId)
                            ->get();
        $usmessages = ChMessage::where('from_id',  $userId)
                            ->where('to_id',$pharmacyId)
                            ->get();

                            $messages= [
                                'psmessages' => $psmessages,
                                'usmessages' => $usmessages,
                            ];

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'to_id' => 'required|integer|exists:users,id',
            'body' => 'required|string|max:5000',
        ]);

        $message = new ChMessage();
        $message->id = (string) \Illuminate\Support\Str::uuid();
        $message->from_id = Auth::id();
        $message->to_id = $request->to_id;
        $message->body = $request->body;
        $message->seen = false;
        $message->save();

        return response()->json(['message' => 'Message sent successfully']);
    }
}
