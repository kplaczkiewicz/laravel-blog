<x-app-layout>
    <div class="prose max-w-4xl container pt-14 pb-28">
        <img src="https://picsum.photos/1000/600" alt="" class="mb-10 max-h-[350px] w-full object-cover">
        <h1>{{ $post->title }}</h1>

        <p class="text-lg mb-8">{{ $post->intro_text }}</p>

        <p>
            {{ $post->content }}
        </p>

        <div class="text-center">
            <a class="btn mt-8" href="/">Back to homepage</a>
        </div>
    </div>
</x-app-layout>
