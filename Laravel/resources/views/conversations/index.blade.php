@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse ($conversations as $conversation)
            <h2 class="text-center mb-3 display-4">
                <a href="/conversations/{{ $conversation->id }}">{{ $conversation->title }}</a>
            </h2>

            @continue($loop->last)

            <hr>
        @empty
        <p>No conversations yet.</p>
        @endforelse
    </div>
@endsection
