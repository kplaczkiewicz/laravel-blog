@php
    $tags = explode(',', $post->tags);
@endphp

<x-app-layout>
    <div class="prose max-w-4xl container pt-14 pb-28">
        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/post-placeholder.jpg') }}"
            alt="post image" class="mb-10 max-h-[350px] w-full object-cover">

        <div class="mb-3">
            @foreach ($post->tags as $tag)
                <div class="badge badge-outline">{{ $tag->name }}</div>
            @endforeach
        </div>

        <h1 class="mb-5">{{ $post->title }}</h1>

        <div class="badge badge-lg">{{ $post->category->name }}</div>

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
