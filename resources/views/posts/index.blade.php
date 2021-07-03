@extends('layouts.app')

@section('onPublicViewButLogged')

<li class="nav-item">

    <a class="nav-link" href="{{ route("admin.posts.index") }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
        Vai alla sezione Admin
    </a>
</li>
@endsection


@section('content')

<div class="container">

    <div class="card-deck">
    @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">{{$post->title}}</h5>
                <p>{{$post->user->name}}</p>
                <p class="font-weight-bold text-info">{{$post->topic->name}}</p>
            </div>

            <div class="card-footer text-center">
                <a class="btn btn-outline-primary my-2" href="{{route("posts.show", $post->slug)}}" role="button">Dettagli...</a>
            </div>
        </div>
    @endforeach
    </div>

</div>

@endsection
