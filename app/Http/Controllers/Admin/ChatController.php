<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
class ChatController extends Controller
{
    public function index(Request $request){


        $data['users'] = User::where('type', 'user');


        if ($request->ajax()) {
            $search = $request->query('q');
            if (!empty($search)) {
                $data['users'] = $data['users']->where('name', 'LIKE', '%' . $search . '%')->orWhere('last_name', 'LIKE', '%' . $search . '%');
            }


            $data['users'] = $data['users']->where('type', 'user')->get();
            return response()->json([
                'html' => view('admin.components.chat_users_list', compact('data'))->render(),
            ]);
        }


        $data['users'] = $data['users']->get();
        return view('admin.pages.support', compact('data'));
    }

    public function chat(Request $request){
        $senderId = auth()->id();
        $userId = $request->id;
        $user = User::find($userId);
        if ($user) {
            # code...
            $chat = Chat::where(function ($query) use ($senderId, $userId) {
                $query->where('sender_id', $senderId)
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($senderId, $userId) {
                $query->where('sender_id', $userId)
                      ->where('receiver_id', $senderId);
            })
            ->orderBy('created_at', 'asc')  // Order by timestamp ascending
            ->get();


            return response()->json([
                'html' => view('admin.components.messages',compact('chat','user'))->render(),
            ]);
        }
        return response()->json([
            'html' => view('admin.components.messages')->render(),
        ]);
    }

    public function fatchChat(Request $request){
        $senderId = auth()->id();


        $chat = Chat::where(function ($query) use ($senderId ) {
            $query->where('sender_id', $senderId) ;
        })
        ->orWhere(function ($query) use ($senderId ) {
            $query ->where('receiver_id', $senderId);
        })
        ->orderBy('created_at', 'asc')
        ->get();


        return response()->json([
            'html' => view('user.components.messages',compact('chat'))->render(),
        ]);

    }

    public function sendMessage(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure the user exists in the database
            'message' => 'required|string|max:1000', // Validate the message input
        ]);

        // Retrieve the validated data
        $userId = $validated['user_id'];
        $messageContent = $validated['message'];


        $senderId = auth()->id();

        $message = new Chat();
        $message->sender_id = $senderId;
        $message->receiver_id = $userId;
        $message->message = $messageContent;
        $message->save();

        // Return a response
        return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully',
            'data' => $message,
        ]);
    }

    public function userSendMessage(Request $request)
    {
        // Validate the input
        $validated = $request->validate([

            'message' => 'required|string|max:1000', // Validate the message input
        ]);


        $messageContent = $validated['message'];

        $admin = User::where('type','admin')->first();
        $senderId = auth()->id();

        $message = new Chat();
        $message->sender_id = $senderId;
        $message->receiver_id = $admin->id??1;
        $message->message = $messageContent;
        $message->save();

        // Return a response
        return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully',
            'data' => $message,
        ]);
    }

}
