<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    public function explore(){
        $albums = Album::with('post')->get();
        return view("explorasi",compact("albums"));
    }
    public function createAlbum(){
        return view("posts.createAlbum");
    }

    public function storeAlbum(Request $request){
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $album = new Album;
        $album->fill([
            'title'=> $request->title,
            'description' => $request->desc,
            'user_id' => Auth::id(),
        ]);
        $album->save();

        return redirect()->route('createAlbum')->with('success','Album Created!');
    }

    public function showAlbum($id){
        $posts = Album::with('post')->findOrFail($id);
        return view('posts.showExploration',compact('posts'));
    }
}
