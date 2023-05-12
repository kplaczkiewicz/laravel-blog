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

        <div class="mt-20">
            <h2>Comments ({{ $approvedComments }})</h2>

            <form class="mb-16" method="POST" action="/comments">
                @csrf

                <!-- Comment -->
                <div>
                    <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">

                    <x-textarea-input id="content" name="content" required autofocus>
                        {{ old('content') }}
                    </x-textarea-input>

                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-5">
                    <x-primary-button class="btn-wide">
                        {{ __('Add comment') }}
                    </x-primary-button>
                </div>
            </form>

            @if ($approvedComments > 0)
                @foreach ($post->comments as $comment)
                    @if ($comment->approved)
                        <div class="flex gap-6 bg-base-200 py-6 px-4 mb-8">
                            <div class="w-[150px] border-r border-r-primary pr-4">
                                <img class="mt-0 mb-2 max-w-[75px]"
                                    src="https://api.dicebear.com/5.x/initials/svg?seed={{ $comment->author }}&backgroundColor=000000" />
                                <span>{{ $comment->author }}</span>
                            </div>

                            <div class="flex-1">
                                {{ $comment->content }}
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
