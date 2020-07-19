@extends('layouts.app')

@section('content')
    <div class="container">
        <p>
            <a href="/conversations">Back</a>
        </p>

        <h1 class="text-center mb-3 display-4">{{ $conversation->title }}</h1>

        <p class="text-muted">Posted by {{ $conversation->user->name }}</p>

        <div class="mb-3">
            {{ $conversation->body }}
        </div>

        <hr>
        @include('conversations.replies')
    </div>
@endsection
