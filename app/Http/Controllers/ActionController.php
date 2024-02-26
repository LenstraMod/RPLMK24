<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;

class ActionController extends Controller
{
    public function like($id){
        $like = new Like();
        $like->fill([
            "user_id"=> auth()->id(),
            "post_id" => $id,
        ]);
        $like->save();

        return redirect()->route('showPost',$id);
    }

    public function dislike($id){
        $like = Like::where('post_id',$id)->first();
        $like->delete();
        return redirect()->route('showPost',$id);
    }

    public function comment(Request $request,$id){
        $comment = new Comment;
        $comment->fill([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'post_id' => $id,
        ]);
        $comment->save();

        return redirect()->route('showPost',$id);
    }

    public function deleteComment($id){
        $comment = Comment::where('post_id',$id)->first();
        $comment->delete();
        return redirect()->route('showPost',$id);
    }

}
