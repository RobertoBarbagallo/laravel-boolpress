<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Topic;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(Request $request)

    {   
        $posts = Post::orderBy("id", "DESC")->where("user_id", $request->user()->id)->get();

        $requestedId = $request->tag_id;

        if(count($request->request) > 0){
            foreach ($posts as $post) {
                $singlePostTags = $post->tags;
                foreach ($singlePostTags as $singlePostTag) {
                    if($requestedId == $singlePostTag->id){
                        $posts = Post::join("post_tag", "posts.id", "=", "post_tag.post_id")
                         ->where("post_tag.tag_id", $requestedId)->get();
                         return view("SuperAdmin.posts.index", [
                        "posts" => $posts
                    ]); 
                    }
                }
            }
        }
        
        return view("SuperAdmin.posts.index", [
            "posts" => $posts
        ]);
    }

    public function create()

    {
        $tags = Tag::all();
        $topics = Topic::all();

        return view('SuperAdmin.posts.create', [
            "topics" => $topics,
            "tags" => $tags
        ]);
    }

    public function store(Request $request)

    {


        $newPostData = $request->all();


        $request->validate([
            "title" => "required|max:255",
            "content" => "required|min:3|",
            "topic_id" => "required|integer",
            'tags' => "exists:tags,id",
            'img' => 'mimes:jpeg,jpg,bmp,png'
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

        $newPost->user_id = $request->user()->id;


        if($request['img']){
            $newPost->img = Storage::put('uploads' , $newPostData['img']);
        }
        
        $newPost->save();
        
        if ($request['tags'] && count($request['tags']) > 0) {
            $newPost->tags()->sync($request["tags"]);
        }
        

        return redirect()->route('SuperAdmin.posts.show', $newPost->id);
    }

    public function show(Post $post)
    {

        return view("SuperAdmin.posts.show", [
            "post" => $post
        ]);
    }

    public function edit(Post $post)
    {
        $topics = Topic::all();
        $tags = Tag::all();

        return view("SuperAdmin.posts.edit", [
            "post" => $post,
            "topics" => $topics,
            "tags" => $tags

        ]);
    }

    public function update(Request $request, Post $post)
    {
  
        $formData = $request->all();

        $request->validate([
            "title" => "required|max:255",
            "content" => "required|min:3|",
            "topic_id" => "required|integer",
            "tags" => "exists:tags,id",
            'img' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        $post->tags()->sync($request["tags"]);
        
        
       
        if (key_exists("img", $formData)) {
            if ($post->img) {
                Storage::delete($post->img);
            }

            $storageResult = Storage::put("uploads", $formData["img"]);

            $formData["img"] = $storageResult;
        }
        $post->update($formData);
        dump($post);
        return redirect()->route("SuperAdmin.posts.show", $post->id);
    }

    public function destroy($id)
    {
        $post = Post::FindOrFail($id);

        $post->delete();

        return redirect()->route("SuperAdmin.posts.index");
    }
}
