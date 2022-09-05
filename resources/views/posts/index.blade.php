@extends('layout')

@section('content')

<x-header />

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @if ($posts->count())
        <x-post-featured-card :post="$posts[0]"/>
        @if ($posts->count() > 1)
            <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1) as $post)
                <x-post-card :post="$post"/>
                @endforeach
            </div>
        @endif

        {{ $posts-> links() }}
    @else
        <p class="text-center">No posts yet!</p>
    @endif

</main>

    <!-- <h1>Larry's Blog</h1>

    @foreach($posts as $post)

    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>

        <p>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            {{ $post->excerpt }}
        </div>
    </article>

    @endforeach -->
@endsection
