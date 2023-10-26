<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Notifications\PostLikeNotification;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->get();
        return view("post",compact('posts'));
     }
     public function postLike(Request $request){
        $user = auth()->user();

        $post = Post::whereId($request->post_id)->with('user')->first();
        // like code -----skip
        $author = $post->user;

        if($author){
            $author->notify(new PostLikeNotification($post,$user));
        }

        return response()->json(['success']);
    }
}
