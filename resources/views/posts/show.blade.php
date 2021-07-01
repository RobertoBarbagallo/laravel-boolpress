@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <a class="pb-5" href="{{ route('posts.index') }}">Torna alla home</a>
</div>

<div class="row justify-content-center">
    <div class="media">
        <div class="media-body">
            <h5 class="mt-0">{{$post->title}}</h5>
            <p>{{$post->author}}</p>
            <p>{{$post->topic}}</p>
            <p>{{$post->content}}</p>
        </div>
    </div>
</div>

@endsection