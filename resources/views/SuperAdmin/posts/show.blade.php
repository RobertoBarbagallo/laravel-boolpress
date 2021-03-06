@extends('layouts.app')

@section('onSuperAdminViewPublicLink')

<li class="nav-item">

    <a class="nav-link" href="{{ route("posts.index") }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
        Vai alla sezione Pubblica
    </a>
</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <a class="btn btn-primary mb-4" href="{{ route('SuperAdmin.posts.index') }}">Torna ai Posts...</a>
</div>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            @if($post->img)
                <img class="card-img-top w-50 mr-auto ml-auto" src="{{ asset('storage/' . $post->img) }}" alt="Card image cap">
            @endif
            <h3 class="font-weight-bold">{{$post->title}}</h3>
            </div>
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
                <div class="text-center">
                <a class="btn btn-outline-info my-1 mt-4" href="{{ route('SuperAdmin.posts.edit', $post->id) }}">Modifica</a>
                @include('partials.components.deleteBtn', ["id" => $post->id, 'resource' => 'posts'])
                </div>
            </div>
    </div>
</div>
@endsection

