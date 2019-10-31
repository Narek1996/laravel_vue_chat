<?php

namespace App\Http\Controllers;

use App\Events\MessagePushed;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function newMessage(Request $request)
    {
        Message::create([
            'message' => $request['message'],
            'type' => $request['type']
        ]);

        MessagePushed::dispatch($request->all());
    }

    public function allMessages()
    {
       $messages = Message::all()->toJson();
       return response($messages,200);
    }
}
