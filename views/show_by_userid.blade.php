@extends('layout.master')


@section('content')

<div class="container">
    <h1>
        {{ $individual_user->username }}
    </h1>
    <p class="blog-post-meta">Registered on : {{ $individual_user->created_at->toFormattedDateString() }}</p>
    <hr>
    <div class="comments">
        <ul class="list-group">
        @foreach($individual_user->comments as $comment)
            <li class="list-group-item">
                <strong>
                    {{ $comment->created_at->diffForHumans() }}: &nbsp;
                </strong>
                {{ $comment->body }}
            </li>
        @endforeach
        </ul>
    </div>

    <hr>

    <div class="card">
        <div class="card-block">
            <form method="POST" action="/users/{{ $individual_user->id }}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here. " class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            @include('layout.error')
        </div>
    </div>


</div>

@endsection