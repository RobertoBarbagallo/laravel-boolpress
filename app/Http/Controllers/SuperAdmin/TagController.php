<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('SuperAdmin.tags.index',[
            "tags"=> $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTagData = $request->all();
        $request->validate([
            "name"=> "max:255|unique:topics",
        ]);

        $newTag = new Tag();

        $newTag->fill($newTagData);

        $slug = Str::slug($newTag->name);
        $slug_base = $slug;
        $slugExist = Tag::where('slug', $slug)->first();
        $counter = 1;
        while ($slugExist) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $slugExist = Tag::where('slug', $slug)->first();
        }

        $newTag->slug = $slug;


        $newTag->save();

        return redirect()->route('SuperAdmin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::FindOrFail($id);
        $tag->delete();
        return redirect()->route("SuperAdmin.tags.index");
    }
}
