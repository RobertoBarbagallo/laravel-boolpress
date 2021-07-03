@extends('layouts.app')

@section('content')
<div class="container">

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
        <input class="btn btn-primary mb-2" type="submit" value="Cerca"><br>
    </form>
</div>
<div class="container">
    <div class="card-deck">
        @foreach($posts as $post)
        @if($_POST['topic_id'] && $_POST['topic_id'] == $post->topic_id)
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
    </div>
</div>
@endif
@endforeach
@endsection
