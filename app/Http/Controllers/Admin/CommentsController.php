<?php

namespace App\Http\Controllers\Admin;

//use App\Comment;
use App\Models\Comment;
use App\Model\Category2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->user_id,
            'comment' => $request->input('comment'),
        ]);

        // send mail if the user commenting is not the ticket owner
//        if ($comment->ticket->user->id !== Auth::user()->id) {
//            $request->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
//        }

        return redirect()->back()->with("status", "Your comment has be submitted.");
    }
}
