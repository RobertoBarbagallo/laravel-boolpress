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

@include("partials.components.errors")
<div class="container">
    <form action="{{ route('SuperAdmin.posts.update', $post) }}" method="post" id="postform">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Inserisci il titolo" value="{{old('title',  $post->title)}}">
            <small id="titleHelp" class="form-text text-muted">Modifica in questo campo il titolo del Post</small>
        </div>


        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="5" aria-describedby="contentHelp" placeholder="Inserisci il contenuto">{{old('content', $post->content)}}</textarea>
            <small id="contentHelp" class="form-text text-muted">Modifica in questo campo il contenuto del Post</small>
        </div>


        <div class="form-group">
            <label for="topic_id">Argomento</label>
            <select class="form-control" name="topic_id" id="topic_id">
                <option disabled value="">Scegli...</option>
                @foreach($topics as $topic)

                <option value="{{ $topic->id }}" }}>
                    {{ $topic->name }}
                </option>
                @endforeach
            </select>
        </div>
         {{-- @if(count($post->tags)!== 0) --}}
        <div class="form-group">
            <label>Etichette</label><br>

            @foreach($tags as $tag)

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    {{ $tag->name }}
                </label>
            </div>
            @endforeach
        </div>
        <input class="btn btn-primary" type="submit" value="Invia"><br>
    </form>



</div>



@endsection
