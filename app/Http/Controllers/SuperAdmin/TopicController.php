<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;

use App\Post;
use App\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)


    {
        // dump($request);
        $posts = Post::where("user_id", $request->user()->id)->get();
        $topics = Topic::all();

        return view("SuperAdmin.topics.index", [
            "topics" => $topics,
            "posts" => $posts
        ]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {   
        $newTopicData = $request->all();
        $request->validate([
            "name"=> "required|max:255|unique:topics",
        ]);

        $newTopic = new Topic();

        $newTopic->fill($newTopicData);

        $slug = Str::slug($newTopic->name);
        $slug_base = $slug;
        $slugExist = Topic::where('slug', $slug)->first();
        $counter = 1;
        while ($slugExist) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $slugExist = Topic::where('slug', $slug)->first();
        }

        $newTopic->slug = $slug;

        $newTopic->save();

        return redirect()->route('SuperAdmin.topics.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */


    public function show(Topic $topic)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::FindOrFail($id);
        $topic->posts()->each(function ($post) {
            $post->topic_id = null;
            $post->save();
        });
        
        $topic->delete();
        return redirect()->route("SuperAdmin.topics.list");
    }

    public function list (){
        $topics = Topic::all();
        return view("SuperAdmin.topics.list", [
            "topics" => $topics 
        ]);
    }
}
