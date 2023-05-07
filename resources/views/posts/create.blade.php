<x-guest-layout class="bg-gray-100">
    <form method="POST" action="/posts">
        @csrf
        <!-- Post title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" type="title" name="title" :value="old('title')" required autofocus />

            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Post intro text -->
        <div>
            <x-input-label for="intro_text" :value="__('Intro')" />
            <x-textarea-input name="intro_text" id="intro_text" :value="old('intro_text')" required autofocus></x-textarea-input>

            <x-input-error :messages="$errors->get('intro')" class="mt-2" />
        </div>

        <!-- Post Content -->
        <div>
            <x-input-label for="content" :value="__('Content')" />
            <x-textarea-input name="content" id="content" :value="old('content')" required autofocus></x-textarea-input>

            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex justify-end mt-5">
            <x-primary-button class="btn-wide">
                {{ __('Post') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
