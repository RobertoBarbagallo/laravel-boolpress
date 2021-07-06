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

<div class="container">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Topic</th>
                <th scope="col">Topic Slug</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)

            <tr>
                <th scope="row">{{$topic->id}}</th>
                <td>{{$topic->name}}</td>
                <td>{{$topic->slug}}</td>
                <td> @include('partials.components.deleteBtn', ["id" => $topic->id, 'resource' => 'topics'])</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
