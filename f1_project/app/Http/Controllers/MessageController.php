<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10);

        return view('messages', ['messages' => $messages]);
    }
}