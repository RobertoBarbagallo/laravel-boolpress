@extends('layouts.app')

@section('content')

<div class="row justify-content-center">



@foreach($posts as $post)
        <div class="media">
        <div class="media-body">
            <h5 class="mt-0">{{$post->title}}</h5>
            <p>{{$post->author}}</p>
            <p>{{$post->topic}}</p>
            <a href="{{route("posts.show", $post->id)}}">Dettagli...</a>
        </div>
    </div>
@endforeach


</div>

@endsection
