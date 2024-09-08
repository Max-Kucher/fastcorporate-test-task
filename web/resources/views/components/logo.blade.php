<a
    wire:navigate
    href="{{ auth()->check() ? route('dashboard') : route('home') }}"
    class="uppercase font-semibold tracking-wider text-2xl"
>
    Logo
</a>
