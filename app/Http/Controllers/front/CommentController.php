<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $postId){

        $validate = $request->validate([
            'comment' => 'required|string',
        ]);

        if(Auth::check()){
           $post = Post::find($postId);

           if(empty($post)){
                return redirect()->back();
           }

           $comment = Comment::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'comment' => $request->comment,
           ]);

        
            return redirect()->back();
        }
    }

    public function commentReplay(Request $request)
    {
        $validate = $request->validate([
            'comment' => 'required|string|max:250',
        ]);

        if(Auth::check()){
            $comment = Comment::find($request->comment_id);
            if(empty($comment)){
                return redirect()->back();
            }

            $reply = CommentReply::create([
                'comment_id' => $request->comment_id,
                'user_id' => Auth::user()->id,
                'comment_reply' => $request->comment,
            ]);
            if($reply){
                return redirect()->back();
            }

        }
    }

    // delete comment 
    public function commentDelete(Request $request)
    {
        
        $comment = Comment::with('commentReplies')->find($request->comment_id);

        if(empty($comment)){
            return redirect()->back();
        }else{
            $comment->commentReplies()->delete();
            $comment->delete();
            return redirect()->back();
        }
    }

    // delete comment reply
    public function commentReplyDelete(Request $request)
    {
        $comment_reply = CommentReply::find($request->comment_reply_id);

        if(empty($comment_reply)){
            return redirect()->back();
        }else{
            $comment_reply->delete();
            return redirect()->back();
        }
    }
}
