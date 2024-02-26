<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(){
        $posts = Post::orderBy('created_at','desc')->get();
        return view('home',compact('posts'));
    }
    public function createPost(){
        $albums = Album::where('user_id', auth()->user()->id)->get();
        return view('posts.create',compact('albums'));
    }

    public function storePost(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4086',
            'title' => 'required',
            'desc' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('assets/images');
        $image->move($imagePath,$imageName);

        $post = new Post;
        $post->fill([
            'title' => $request->title,
            'description'=> $request->desc,
            'image'=> $imageName,
            'user_id' => Auth::id(),
            'album_id' => $request->album,
        ]);
        $post->save();

        return redirect()->route('showPost',$post->id);
    }

    public function showPost($id){
        $post = Post::with(['user','comments'])->findOrFail($id);
        $like = Like::where('post_id', $id)->where('user_id',Auth::id())->first();
        return view('posts.show',compact('post','like'));
    }

    public function editPost(Request $request,$id){
        $post = Post::find($id);
        $post->fill([
            'title'=> $request->title,
            'description'=> $request->desc,
        ]);
        $post->update();

        return redirect()->route('showPost',$id);

    }

    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('home');
    }

}
