@extends('layouts.app')

@section('onSuperAdminViewPublicLink')

<li class="nav-item">

    <a class="nav-link" href="{{ route("posts.index") }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
        Vai alla sezione Pubblica
    </a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('SuperAdmin.posts.create') }}" role="button">Aggiungi post...</a>
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('SuperAdmin.topics.index') }}" role="button">Vai ai Topics...</a>
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('SuperAdmin.tags.index') }}" role="button">Vai alle Etichette...</a>
        @if(request()->get('tag_id'))
          <a class="btn btn-primary mb-4 mx-4" href="{{ route('SuperAdmin.posts.index') }}" role="button">Azzera i filtri...</a>
        @endif  
    </div>
    <div class="card-deck flex-wrap">
    @if($posts)
        
        @foreach($posts as $post)
        <div class="card mycard my-4">
            <div class="card-body">
                <h5 class="mt-0">{{$post->title}}</h5>
                <p>{{$post->user->name}}</p>
                @if($post->topic)
                <p class="font-weight-bold text-info">{{$post->topic->name}}</p>
                @endif
                @if($post->tags)
                    @foreach($post->tags as $tag)

                        <span class="badge badge-pill badge-info">{{$tag->name}}</span>
                    @endforeach
                @endif
            </div>

            <div class="card-footer text-center">
                <a class="btn btn-outline-primary my-1" href="{{route("SuperAdmin.posts.show", $post->id)}}" role="button">Dettagli...</a><br>
                <a class="btn btn-outline-info my-1" href="{{ route('SuperAdmin.posts.edit', $post->id) }}">Modifica</a><br>
                @include('partials.components.deleteBtn', ["id" => $post->id, 'resource' => 'posts'])
            </div>
        </div>
        @endforeach
    @endif
    </div>
</div>



@endsection
