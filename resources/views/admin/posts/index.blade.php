@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <a class="pb-5" href="{{ route('admin.posts.create') }}">Aggiungi post...</a>
</div>
<div class="row justify-content-center">


    @foreach($posts as $post)
    <div class="media">
        <div class="media-body">
            <h5 class="mt-0">{{$post->title}}</h5>
            <p>{{$post->author}}</p>
            <p>{{$post->topic}}</p>
            <a href="{{route("admin.posts.show", $post->id)}}">Dettagli...</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            @include('partials.components.deleteBtn', ["id" => $post->id])
        </div>
    </div>
    @endforeach


</div>

@endsection
