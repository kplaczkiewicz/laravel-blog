@php
    $tags = explode(',', $post->tags);
@endphp

<x-app-layout>
    <div class="prose max-w-4xl container pt-14 pb-28">
        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/post-placeholder.jpg') }}"
            alt="post image" class="mb-10 max-h-[350px] w-full object-cover">

        <div class="mb-2">
            @foreach ($post->tags as $tag)
                <div class="badge badge-outline">{{ $tag->name }}</div>
            @endforeach
        </div>

        <div class="badge badge-lg mb-4">{{ $post->category->name }}</div>

        <h1 class="mb-3">{{ $post->title }}</h1>

        <p class="mb-5 mt-0 text-right text-xl">- {{ $post->user->name }}</p>

        <p class="text-lg mb-8">{{ $post->intro_text }}</p>

        <div>
            {!! $post->content !!}
        </div>

        <div class="text-center">
            <a class="btn mt-12" href="/">Back to homepage</a>
        </div>

        <div class="mt-10">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn">Edit</a>

            <form action="/posts/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-error mt-4">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>
