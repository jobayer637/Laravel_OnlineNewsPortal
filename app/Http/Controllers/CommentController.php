<?php

namespace App\Http\Controllers;

use App\Comment;
use App\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment($id, Request $request)
    {
        $value = new Comment;
        $value->article_id = $id;
        $value->user_id = Auth::id();
        $value->comment = $request->comment;
        $value->save();
        return redirect()->back();
    }

    public function replyComment($id, Request $request)
    {
        $value = new ReplyComment;
        $value->comment_id = $id;
        $value->user_id = Auth::id();
        $value->reply = $request->reply;
        $value->save();
        return redirect()->back();
    }
}
