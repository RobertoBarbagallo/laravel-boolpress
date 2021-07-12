@extends('layouts.app')

@section('onPublicViewButLogged')

<li class="nav-item">

    <a class="nav-link" href="{{ route("SuperAdmin.posts.index") }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
        Vai alla sezione SuperAdmin
    </a>
</li>
@endsection


@section('content')

<div class="container">

    <div class="card-deck flex-wrap">
    @foreach($posts as $post)
        <div class="card mycard my-4">
            @if($post->img)
                <img class="card-img-top myimg" src="{{ asset('storage/' . $post->img) }}" alt="Card image cap">
            @endif
            <div class="card-body">
                <h5 class="mt-0">{{$post->title}}</h5>
                <p>{{$post->user->name}}</p>
                @if($post->topic)
                <p class="font-weight-bold text-info">{{$post->topic->name}}</p>
                @endif
                    @foreach($post->tags as $tag)
                   <span class="badge badge-pill badge-info">{{$tag->name}}</span> 
                @endforeach
            </div>

            <div class="card-footer text-center">
                <a class="btn btn-outline-primary my-2" href="{{route("posts.show", $post->slug)}}" role="button">Dettagli...</a>
            </div>
        </div>
    @endforeach
    </div>

</div>

@endsection
