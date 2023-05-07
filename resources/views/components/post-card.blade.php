@props(['post'])

<div class="card bg-base-100 shadow">
    <figure>
        <img src="https://picsum.photos/500/300?random={{ $post->id }}" alt="placeholder">
    </figure>

    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p>{{ Str::limit($post->intro_text, 140) }}</p>

        <div class="mt-4 card-actions justify-end">
            <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read more</a>
        </div>
    </div>
</div>