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

    @if(count($posts) > 0)
    <form method="post" id="topicform">
        @csrf

        <div class="form-group">
            <label for="topic_id">Argomento</label>
            <select class="form-control" name="topic_id" id="topic_id">
                <option value="">Scegli...</option>
                @foreach($topics as $topic)

                <option value="{{ $topic->id }}" }}>
                    {{ $topic->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <input class="btn btn-primary mb-4" type="submit" value="Cerca"><br>
        </div>
    @endif
        <div class="text-center">
            <a class="btn btn-info my-1" href="{{ route('SuperAdmin.topics.create') }}" role="button">Aggiungi un Topic</a><br>
            <a class="btn btn-info my-1 mb-4" href="{{ route('SuperAdmin.topics.list') }}" role="button">Mostra tutti i Topics</a>
        </div>

    </form>
</div>
<div class="container">
    <div class="card-deck">
        @foreach($posts as $post)

        @if($_POST)
            @if($_POST['topic_id'] == $post->topic_id)
            <div class="card" >
                <div class="card-body">
                    <h5 class="mt-0">{{$post->title}}</h5>
                    <p>{{$post->user->name}}</p>
                    <p class="font-weight-bold text-info">{{$post->topic->name}}</p>
                </div>

                <div class="card-footer text-center">
                    <a class="btn btn-outline-primary my-1" href="{{route("SuperAdmin.posts.show", $post->id)}}" role="button">Dettagli...</a><br>
                    <a class="btn btn-outline-info my-1" href="{{ route('SuperAdmin.posts.edit', $post->id) }}">Modifica</a><br>
                    @include('partials.components.deleteBtnPosts', ["id" => $post->id])
                </div>
            </div>
            @endif
        @endif
        @endforeach
    </div>
</div>
@endsection
