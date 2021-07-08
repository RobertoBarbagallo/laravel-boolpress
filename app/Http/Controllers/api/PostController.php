<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    

    public function index() {
      
        $posts = Post::with("topic")->with("tags")->get();
    
        return response()->json([
          "success" => true,
          "results" => $posts
        ]);
      }
}
