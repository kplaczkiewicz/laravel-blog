@props(['filter_name', 'filter_elements'])

@php
    $query_param = Str::lower(Str::singular($filter_name));
@endphp

<div {{ $attributes->merge(['class' => 'prose max-w-none']) }}>
    <h3 class="inline-block mb-0">{{ $filter_name }}:</h3>

    <div class="inline-flex gap-4 ml-4">
        @foreach ($filter_elements as $filter_element)
            <a 
                class="filter-item border border-primary py-1 px-5 cursor-pointer no-underline transition-colors hover:text-primary-content hover:bg-primary"
                data-query-param="{{ $query_param }}"
                data-query-value="{{ Str::lower($filter_element) }}"
            >
                {{ $filter_element }}
                <i class="remove-filter fa-solid fa-circle-xmark ml-2 hidden"></i>
            </a>
        @endforeach
    </div>
</div>
