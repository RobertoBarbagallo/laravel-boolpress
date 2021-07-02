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
    <a class="pb-5 " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
@include("partials.components.errors")
<div class="container">
    <form action="{{ route('admin.posts.update', $post) }}" method="post" id="postform">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Inserisci il titolo" value="{{old('title',  $post->title)}}">
            <small id="titleHelp" class="form-text text-muted">Inserisci in questo campo il titolo del Post</small>
        </div>


        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="5" aria-describedby="contentHelp" placeholder="Inserisci il contenuto">{{old('content', $post->content)}}</textarea>
            <small id="contentHelp" class="form-text text-muted">Inserisci in questo campo il contenuto del Post</small>
        </div>

        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp" placeholder="Inserisci l'autore" value="{{old('author',  $post->author)}}">
            <small id="authorHelp" class="form-text text-muted">Inserisci in questo campo l'autore del Post</small>
        </div>

        <div class="form-group">
            <label for="topic">Argomento</label>
            <input type="text" class="form-control" id="topic" name="topic" aria-describedby="topicHelp" placeholder="Inserisci l'argomento" value="{{old('topic',  $post->topic)}}"">
            <small id=" topicHelp" class="form-text text-muted">Inserisci in questo campo l'argomento del Post</small>
        </div>

        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
