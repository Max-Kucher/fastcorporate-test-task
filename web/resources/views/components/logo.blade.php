<a
    wire:navigate
    href="{{ auth()->check() ? route('profile') : route('home') }}"
    class="uppercase font-semibold tracking-wider text-2xl"
>
    Logo
</a>
