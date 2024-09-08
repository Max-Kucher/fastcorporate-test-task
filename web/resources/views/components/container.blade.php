@php
$class = 'mx-auto max-w-container px-4 sm:px-6 lg:px-8';
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>
