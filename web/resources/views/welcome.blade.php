@php
$btnClass = 'flex items-center justify-center min-w-32 min-h-12 text-xl';
@endphp

<x-app-layout>
    <x-container>
        <div class="flex items-center justify-center max-w-md mx-auto min-h-[70dvh] gap-8">
            <x-buttons.primary
                href="{{ route('login') }}"
                wire:navigate
                class="{{ $btnClass }}"
            >
                Login
            </x-buttons.primary>

            <x-buttons.secondary
                href="{{ route('register') }}"
                wire:navigate
                class="{{ $btnClass }}"
            >
                Register
            </x-buttons.secondary>
        </div>
    </x-container>
</x-app-layout>
