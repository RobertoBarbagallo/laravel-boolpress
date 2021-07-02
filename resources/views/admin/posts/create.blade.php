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
            <label for="topic_id">Argomento</label>
            <select class="form-control" name="topic_id" id="topic_id">
                <option  value="">Scegli...</option>
                @foreach($topics as $topic)

                <option value="{{ $topic->id }}"}}>
                    {{ $topic->name }}
                </option>
                @endforeach


            </select>
        </div>
        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
