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

    public function show($slug)
    {   

        $post = Post::where('slug', $slug)->first();

        return view("posts.show", [
            "post" => $post
        ]);
    }
}
