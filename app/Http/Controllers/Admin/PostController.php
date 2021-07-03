<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

use App\Topic;

use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy("id", "DESC")->where("user_id", $request->user()->id)->get();
        return view("admin.posts.index", [
            "posts" => $posts 
        ]);
    }

    public function create()
    {       
        $topics = Topic::all();
        return view('admin.posts.create',[
            "topics"=> $topics
        ]);
    }

    public function store(Request $request)

    {
    
        $newPostData = $request->all();


        $request->validate([
            "title"=> "required|max:255|unique:posts",
            "content"=> "required|min:3|"
        ]);



        $newPost = new Post();
        $newPost->fill($newPostData);
        $slug = Str::slug($newPost->title);
        $slug_base = $slug;
        $slugExist = Post::where('slug', $slug)->first();
        $counter = 1;
        while ($slugExist) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $slugExist = Post::where('slug', $slug)->first();
        }

        $newPost->slug = $slug;

        $newPost->user_id= $request->user()->id;

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
        $topics = Topic::all();

        return view("admin.posts.edit", [
            "post" => $post,
            "topics" => $topics

        ]);
    }

    public function update(Request $request, Post $post)
    {
        $formData = $request->all();

        $request->validate([
            "title"=> "required|max:255|unique:posts",
            "content"=> "required|min:3|",
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
