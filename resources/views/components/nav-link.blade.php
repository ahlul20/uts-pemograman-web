@props(['active' => false, 'href' => '#'])

@php
$classes = ($active ?? false)
            ? 'nav-link active fw-medium text-dark px-2'
            : 'nav-link text-secondary px-2';
@endphp

<li class="nav-item">
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
