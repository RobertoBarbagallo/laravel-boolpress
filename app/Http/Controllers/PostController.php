<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("id", "DESC")->get();
        return view("posts.index", [
            "posts" => $posts 
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", [
            "post" => $post
        ]);
    }
}
