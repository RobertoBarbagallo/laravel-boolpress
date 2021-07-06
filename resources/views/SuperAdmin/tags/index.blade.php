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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Tag</th>
                <th scope="col">Tag Slug</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)

            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->name}}</td>
                <td>{{$tag->slug}}</td>
                <td> @include('partials.components.deleteBtnTags', ["id" => $tag->id])</td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <a class="btn btn-info my-2 mb-4" href="{{ route('SuperAdmin.tags.create') }}" role="button">Aggiungi una Etichetta...</a>
    </div>
</div>

@endsection
