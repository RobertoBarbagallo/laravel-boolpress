<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Topic;

class ListController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view("SuperAdmin.list.index", [
            "topics" => $topics 
        ]);
    }
}
