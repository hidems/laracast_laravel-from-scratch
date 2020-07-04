@extends('simplework_layout')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            @forelse ($articles as $article)
                <div class="title">
                    <h2>
                        <a href="{{ $article->path() }}">
                            {{ $article->title }}
                        </a>
                    </h2>
                </div>
                <div>
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    <p>
                        <a href="/simplework/articles/{{ $article->id }}">
                            {{ $article->excerpt }}
                        </a>
                    </p>
                </div>
            @empty
                <p>No relevant articles yet.</p>
            @endforelse
        </div>
	</div>
</div>
@endsection
