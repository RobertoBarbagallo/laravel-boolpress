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
    <input type="submit" value="Cerca"><br>
</form>
</div>
@foreach($posts as $post)
@if($_POST['topic_id'] && $_POST['topic_id'] == $post->topic_id)
<div class="container">
<div class="row py-5">


    <div class="media">
        <div class="media-body">
            <h5 class="mt-0">{{$post->title}}</h5>
            <p>{{$post->user->name}}</p>
            <p>{{$post->topic->name}}</p>
            <a href="{{route("admin.posts.show", $post->id)}}">Dettagli...</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            @include('partials.components.deleteBtn', ["id" => $post->id])
        </div>
    </div>

</div>

</div>
@endif
@endforeach
@endsection
