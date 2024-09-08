@props([
    'type' => 'submit',
    'color' => 'primary',
    'href' => null,
])

@php
    $colorClasses = [
        'primary' => 'bg-gray-800 border-transparent text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500',
        'secondary' => 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-indigo-500',
        'danger' => 'bg-red-600 border border-transparent text-white hover:bg-red-500 active:bg-red-700 focus:ring-red-500',
    ][$color];

    $baseClasses = "$colorClasses inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150";
@endphp

@if ($href)
    <a {{ $attributes->merge(['class' => $baseClasses]) }} href="{{ $href }}">
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => $type, 'class' => $baseClasses]) }}>
        {{ $slot }}
    </button>
@endif
