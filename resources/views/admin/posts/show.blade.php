@extends('layouts.app')

@section('onAdminViewPublicLink')

<li class="nav-item">

    <a class="nav-link" href="{{ route("posts.index") }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
        Vai alla sezione Pubblica
    </a>
</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <a class="pb-5" href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>

<div class="row justify-content-center">
    <div class="media">
        <div class="media-body">
            <h5 class="mt-0">{{$post->title}}</h5>
            <p>{{$post->author}}</p>
            <p>{{$post->topic}}</p>
            <p>{{$post->content}}</p>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            @include('partials.components.deleteBtn', ["id" => $post->id])
        </div>
    </div>
</div>

@endsection
