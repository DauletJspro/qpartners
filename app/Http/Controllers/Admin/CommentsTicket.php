<?php

namespace App\Http\Controllers\Admin;

use App\Models\CommentTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsTicket extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = CommentTicket::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->user_id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with("status", "Ваш комментарий отправлен.");
    }
}
