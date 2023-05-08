<x-guest-layout class="bg-gray-100">
    <form method="POST" action="/posts">
        @csrf
        <!-- Post tags -->
        <div class="mb-3">
            <x-input-label for="tags" :value="__('Tags')" />

            @foreach ($tags as $tag)
                <div class="form-control inline-flex mr-2">
                    <label class="label cursor-pointer inline-flex gap-3">
                        <input type="checkbox" class="checkbox" value="{{ $tag->name }}" name="tags[]" />
                        <span class="label-text">{{ $tag->name }}</span>
                    </label>
                </div>
            @endforeach

            <!-- Add new tag -->
            <label for="add_tag" class="link block mt-2 text-sm">Add new tag</label>

            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
        </div>

        <!-- Post title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" :value="old('title')" required autofocus />

            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Post intro text -->
        <div>
            <x-input-label for="intro_text" :value="__('Intro')" />
            @php
            @endphp
            <x-textarea-input name="intro_text" id="intro_text" required autofocus>
                {{ old('intro_text') }}
            </x-textarea-input>

            <x-input-error :messages="$errors->get('intro')" class="mt-2" />
        </div>

        <!-- Post Content -->
        <div>
            <x-input-label for="content" :value="__('Content')" />
            <x-textarea-input name="content" id="content" required autofocus>
                {{ old('content') }}
            </x-textarea-input>

            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex justify-end mt-5">
            <x-primary-button class="btn-wide">
                {{ __('Add post') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Add tag modal -->
    <x-modal name="add_tag">
        <div class="prose">
            <h2 class="mb-4">Add new tag</h2>
        </div>

        <form method="POST" action="/tags">
            @csrf
            <!-- Tag name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" required autofocus />

                <x-input-error :messages="$errors->get('intro')" class="mt-2" />
            </div>

            <!-- Submit -->
            <div class="flex justify-end mt-5">
                <x-primary-button class="btn-wide">
                    {{ __('Add tag') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</x-guest-layout>

{{-- Add tags and cats as tables --}}
{{-- Add WYSIWYG --}}
