@include('partials._header')
@include('partials._navigation')

<main class="flex-1">
    {{ $slot }}
</main>

@include('partials._footer')
