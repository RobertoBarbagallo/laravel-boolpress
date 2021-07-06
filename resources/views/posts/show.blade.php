@extends('layouts.app')

@section('onPublicViewButLogged')

<li class="nav-item">
    <a id="navbarLink" class="nav-link" href="{{ route("SuperAdmin.posts.index") }}" role="navigation" v-pre>
        Vai alla sezione SuperAdmin
    </a>
</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <a class="btn btn-primary my-2 mb-4" href="{{ route('posts.index') }}" role="button">Torna alla home</a>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="font-weight-bold">{{$post->title}}</h3>
            <div class="card-body">
                <blockquote class="blockquote">
                    <p>{{$post->content}}</p>
                    <p class="font-weight-bold">{{$post->user->name}}</p>
                    @if($post->topic)
                    <footer class="blockquote-footer"><cite title="Source Topic" class="text-info">{{$post->topic->name}}</cite></footer>
                    @endif
                </blockquote>
                @if(count($post->tags)<1) <em>Non ci sono Etichette</em><br>
                @else
                    @foreach($post->tags as $tag)
                         <span class="badge badge-pill badge-info">{{$tag->name}}</span>
                    @endforeach
                    <br>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
