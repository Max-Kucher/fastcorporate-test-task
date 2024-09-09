<?php

use App\Events\CowBoughtEvent;
use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Volt\Component;

new class extends Component {
    public bool $clicked = false;

    public Authenticatable $user;

    public function handleBuyACow(): void
    {
        $this->clicked = true;
        $this->dispatch('cow-bought');

        CowBoughtEvent::dispatch($this->user, url()->current());
    }

    public function mount(Authenticatable $user): void
    {
        $this->user = $user;
    }
};

?>

<div class="space-y-6">
    @if (!$clicked)
        <form wire:submit="handleBuyACow">
            <x-buttons.primary class="uppercase w-full justify-center">
                {{ __('Buy a cow') }}
            </x-buttons.primary>
        </form>
    @else
        <p class="text-xl font-semibold capitalize">
            {{ __('Thank you!') }}
        </p>
    @endif

    <x-action-message
        class="me-3"
        on="cow-bought"
    >
        {{ __('You purchased an excellent cow.') }}
    </x-action-message>
</div>
