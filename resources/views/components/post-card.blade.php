@props(['post'])

<div class="card bg-base-100 shadow rounded-sm">
    <figure>
        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/post-placeholder.jpg') }}" alt="post image">
    </figure>

    <div class="card-body">
        <div class="mb-2">
            @foreach ($post->tags as $tag)
                <div class="badge badge-outline">{{ $tag->name }}</div>
            @endforeach
        </div>

        <div class="badge badge-lg mb-2">{{ $post->category->name }}</div>

        <h2 class="card-title">{{ $post->title }}</h2>

        <p class="mb-2 flex-grow-0 text-right">- {{ $post->user->name }}</p>


        <p>{{ Str::limit($post->intro_text, 140) }}</p>

        <div class="mt-4 card-actions justify-end">
            <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">Read more</a>
        </div>
    </div>
</div>
