@include('partials._header')
@include('partials._navigation')

<main {{ $attributes->merge(['class' => 'flex-1']) }}>
    {{ $slot }}
</main>

@include('partials._footer')
