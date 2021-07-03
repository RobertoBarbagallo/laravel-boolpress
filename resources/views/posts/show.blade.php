@extends('layouts.app')

@section('onPublicViewButLogged')

<li class="nav-item">
    <a id="navbarLink" class="nav-link" href="{{ route("admin.posts.index") }}" role="navigation" v-pre>
        Vai alla sezione Admin
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
                    <footer class="blockquote-footer"><cite title="Source Topic" class="text-info">{{$post->topic->name}}</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>

@endsection
