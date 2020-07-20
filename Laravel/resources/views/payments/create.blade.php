@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/payments">

      @csrf

        <button class="btn btn-primary" type="submit" formmethod="POST">Make Payment</button>

    </form>

{{--
        @if ($events)
            @foreach ($events as $event)
                <p>{{ $event }}</p>
            @endforeach
            {{ var_dump($events) }}
        @endif
--}}

    <p class="mt-4">
        <a href="/notifications">Checnk Notifications</a>
    </p>

</div>
@endsection
