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
    <a class="btn btn-primary mb-4" href="{{ route('SuperAdmin.topics.index') }}">Torna ai Topics...</a>
</div>

@include("partials.components.errors")

<div class="container">
    <form action="{{ route('SuperAdmin.topics.store.store') }}" method="post" id="topicform">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Inserisci il nome della categoria">
            <small id="nameHelp" class="form-text text-muted">Inserisci in questo campo il nome della categoria</small>
        </div>
        <input type="hidden" name="id">
        <input class="btn btn-primary" type="submit" value="Invia"><br>
    </form>
</div>



@endsection
