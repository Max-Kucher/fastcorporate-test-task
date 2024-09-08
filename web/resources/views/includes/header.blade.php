<header>
    <x-container class="flex justify-between items-center py-9">
        <x-logo />

        @auth
            <livewire:layout.authorised-navigation />
        @else
            <livewire:layout.guest-navigation />
        @endif
    </x-container>
</header>
