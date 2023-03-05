<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index(){
        return view('posts.post');
    }
    public function create(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description')
        ]);
        return redirect('/posts')->with('status', 'Post has been created successfully.');
    }
    
    public function read(){
        $posts = Post::all();
        return view('posts.read', ['posts'=>$posts]);
    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.update', ['post'=>$post]);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required', 
            'description' => 'required'
        ]);
        Post::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return redirect('posts')->with('status', "Post has been updated successfully.");
    }

    public function destroy($id){
        Post::destroy($id);
        return redirect("posts")->with('status', "Post has been deleted successfully.");
    }
}
