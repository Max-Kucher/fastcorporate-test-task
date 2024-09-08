<nav>
    <ul class="flex gap-6">
        <li>
            <x-nav-link href="{{ route('login') }}" wire:navigate>
                Login
            </x-nav-link>
        </li>

        <li>
            <x-nav-link href="{{ route('register') }}" wire:navigate>
                Register
            </x-nav-link>
        </li>
    </ul>
</nav>
