<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\SubMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $messages = Message::latest()->get();
        } else {
            $messages = Message::where('sender_id', Auth::user()->id)->orWhere('receiver_id', Auth::user()->id)->latest()->get();
        }

        $receivers = User::where('is_active', 1)->orderBy('role', 'asc')->get();

        return view('pages.message.index', compact('messages', 'receivers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'min:6'],
            'body' => ['required', 'string', 'min:3']
        ]);

        $validatedData['sender_id'] = Auth::user()->id;
        $validatedData['receiver_id'] = $request->receiver;
        $validatedData['slug'] = Str::slug($request->title) . '-' . time();
        Message::create($validatedData);

        Alert::success('Berhasil!', 'Pesan berhasil terkirim!');

        return back();
    }

    public function show($slug)
    {
        $message = Message::where('slug', $slug)->first();

        if ($message->status == 'unread' && Auth::user()->id != $message->sender_id) {
            $message->update(['status' => 'read']);
        }

        $replies = SubMessage::where('message_id', $message->id)->get();

        return view('pages.message.show', compact('message', 'replies'));
    }

    public function reply(Request $request, $slug)
    {
        SubMessage::create([
            'message_id' => Message::where('slug', $slug)->first()->id,
            'sender_id' => Auth::user()->id,
            'body' => $request->body
        ]);

        Alert::success('Berhasil!', 'Pesan berhasil terkirim!');
        return back();
    }
}
