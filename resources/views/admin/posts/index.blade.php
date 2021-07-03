@extends('layouts.app')

@section('onAdminViewPublicLink')

<li class="nav-item">

    <a class="nav-link" href="{{ route("posts.index") }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
        Vai alla sezione Pubblica
    </a>
</li>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-4" href="{{ route('admin.posts.create') }}" role="button">Aggiungi post...</a>
    </div>
    <div class="card-deck">
        @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">{{$post->title}}</h5>
                <p>{{$post->user->name}}</p>
                <p class="font-weight-bold text-info">{{$post->topic->name}}</p>
            </div>

            <div class="card-footer text-center">
                <a class="btn btn-outline-primary my-1" href="{{route("posts.show", $post->slug)}}" role="button">Dettagli...</a><br>
                <a class="btn btn-outline-info my-1" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a><br>
                @include('partials.components.deleteBtn', ["id" => $post->id])
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection
