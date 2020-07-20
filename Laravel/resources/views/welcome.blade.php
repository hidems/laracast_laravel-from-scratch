@extends('layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>

        <h2 class="mt-5">Developed Function</h2>
        <div class="links">
            <a href="/simplework/articles">Article</a>
            <a href="/contact">Mail</a>
            <a href="/login">login</a>
            <a href="/conversations">Conversation</a>
            <a href="/home">Role and ability</a>
            <a href="/payments/create">Notification</a>
            <a href="https://github.com/hidems/laracast_laravel-from-scratch">GitHub</a>
        </h2>
    </div>
</div>

@endsection
