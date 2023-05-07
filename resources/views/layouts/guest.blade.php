@include('partials._header')
@include('partials._navigation')

<main class="flex-1 bg-gray-100">
    <div class="py-20 flex flex-col sm:justify-center items-center">
        <a href="/" class="block">
            <x-application-logo class="text-[5rem] text-primary" />
        </a>

        <div class="w-full max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</main>

@include('partials._footer')
