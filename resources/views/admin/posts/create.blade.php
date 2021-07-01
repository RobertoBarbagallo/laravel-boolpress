@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <a class="pb-5 " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
@include("partials.components.errors")
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="post" id="postform">
        @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Inserisci il titolo">
            <small id="titleHelp" class="form-text text-muted">Inserisci in questo campo il titolo del Post</small>
        </div>


        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="5" aria-describedby="contentHelp" placeholder="Inserisci il contenuto"></textarea>
            <small id="contentHelp" class="form-text text-muted">Inserisci in questo campo il contenuto del Post</small>
        </div>

        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp" placeholder="Inserisci l'autore">
            <small id="authorHelp" class="form-text text-muted">Inserisci in questo campo l'autore del Post</small>
        </div>

        <div class="form-group">
            <label for="topic">Argomento</label>
            <input type="text" class="form-control" id="topic" name="topic" aria-describedby="topicHelp" placeholder="Inserisci l'argomento">
            <small id="topicHelp" class="form-text text-muted">Inserisci in questo campo l'argomento del Post</small>
        </div>

        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
