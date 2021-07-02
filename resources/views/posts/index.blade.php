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

    @foreach($posts as $post)
<div class="row py-5">
        <div class="media">
            <div class="media-body">
                <h5 class="mt-0">{{$post->title}}</h5>
                <p>{{$post->user->name}}</p>
                <p>{{$post->topic->name}}</p>
                <a href="{{route("posts.show", $post->slug)}}">Dettagli...</a>
            </div>
        </div>
</div>
    @endforeach

</div>

@endsection
