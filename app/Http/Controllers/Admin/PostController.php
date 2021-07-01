<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("id", "DESC")->get();
        return view("admin.posts.index", [
            "posts" => $posts 
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $newPostData = $request->all();


        $request->validate([
            "title"=> "required|max:255|unique:posts",
            "content"=> "required|min:3|",
            "author" => "required|max:255",
            "topic" => "required|max:255",
        ]);



        $newPost = new post();
        $newPost->fill($newPostData);
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    public function show(Post $post)
    {
        return view("admin.posts.show", [
            "post" => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view("admin.posts.edit", [
            "post" => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $formData = $request->all();

        $request->validate([
            "title"=> "required|max:255|unique:posts",
            "content"=> "required|min:3|",
            "author" => "required|max:255",
            "topic" => "required|max:255",
        ]);


        $post->update($formData);

        return redirect()->route("admin.posts.show", $post->id);
    }

    public function destroy($id)
    {   $post = Post::FindOrFail($id);

        $post->delete();

        return redirect()->route("admin.posts.index");
    }


}
