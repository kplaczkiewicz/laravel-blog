<x-app-layout>
    <div class="hero min-h-[400px] bg-cover" style="background-image: url('{{ asset('assets/img/hero-bg.jpg') }}')">
        <div class="hero-overlay bg-opacity-60 "></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-4xl font-bold">Welcome to Larablog</h1>
                <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                    exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.</p>

                @auth
                    <a class="btn btn-info" href="{{ route('posts.create') }}">
                        Add a post
                    </a>
                @else
                    <a class="btn btn-info" href="{{ route('login') }}">
                        Join us
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <div class="py-10 container max-w-6xl">
        <div class="text-center font-bold prose max-w-none">
            <h1>Latest posts</h1>
        </div>

        <div class="mt-12">
            <x-posts-filter filter_name="Categories" :filter_elements="$categories" class="border-b border-b-primary mb-4 pb-4"/>
            <x-posts-filter filter_name="Tags" :filter_elements="$tags"/>

            <div class="flex justify-end mt-4">
                <a class="btn btn-error" href="/">Remove filters</a>
            </div>
        </div>
        @if (count($posts) > 0)
            <div class="grid grid-cols-3 py-12 gap-8">
                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        @else
            <p class="py-8">No posts found</p>
        @endif

        <div class="mt-6">
            {{ $posts->appends($_GET)->links() }}
        </div>
    </div>
</x-app-layout>
