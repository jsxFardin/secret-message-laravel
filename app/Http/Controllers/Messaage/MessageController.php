<?php

namespace App\Http\Controllers\Messaage;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
    public function index()
    {
        $messages = [];
        $authUserId = auth()->user()->id;;
        $users = User::where('id', '!=', $authUserId)->get();
        $recepient = (request('recepient') ? request('recepient') : $users->first()) ? $users->first()->id : null;
        
        if ($recepient) {
            $messages = Message::with('sender', 'recepient')
            ->whereIn('sender_id',[$authUserId, $recepient])
            ->whereIn('recepient_id',[$authUserId, $recepient])
            ->orderBy('created_at', 'asc') 
            ->get();

            // markAsRead
            $ids = $messages->pluck('id');
            Message::whereIn('id', $ids)->update(['read_at' => now()]);
        }

        return view('dashboard', [
            'users' => $users,
            'messages' => $messages,
            'recepient' => $recepient
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'recepient' => 'required',
            'text' => 'required'
        ]);
        $message = new Message();
        $message->recepient_id = $request->recepient;
        $message->sender_id = auth()->user()->id;
        $message->text = $request->text;
        $message->save();
        return redirect()->back();
    }
}
