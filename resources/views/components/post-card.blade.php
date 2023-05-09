@props(['post'])

<div class="card bg-base-100 shadow rounded-sm">
    <figure>
        <img src="https://picsum.photos/500/300?random={{ $post->id }}" alt="placeholder">
    </figure>

    <div class="card-body">
        <div class="mb-2">
            @foreach ($post->tags as $tag)
                <div class="badge badge-outline">{{ $tag->name }}</div>
            @endforeach
        </div>

        <h2 class="card-title">{{ $post->title }}</h2>

        <div class="badge badge-lg mb-2">{{ $post->category->name }}</div>

        <p>{{ Str::limit($post->intro_text, 140) }}</p>

        <div class="mt-4 card-actions justify-end">
            <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read more</a>
        </div>
    </div>
</div>