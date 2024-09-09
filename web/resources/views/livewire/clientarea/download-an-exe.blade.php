<?php

use App\Events\FileDownloadedEvent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Livewire\Volt\Component;
use Symfony\Component\HttpFoundation\StreamedResponse;

new class extends Component {
    public bool $clicked = false;

    public Authenticatable $user;

    public function handleExeDownloading(): StreamedResponse
    {
        $this->dispatch('file-downloaded');
        FileDownloadedEvent::dispatch($this->user, url()->current());

        return Storage::disk('local')->download('bin/myprogram.exe');
    }

    public function mount(Authenticatable $user): void
    {
        $this->user = $user;
    }
};

?>

<div class="space-y-6">
    @if (!$clicked)
        <form wire:submit="handleExeDownloading">
            <x-buttons.primary class="uppercase w-full justify-center">
                {{ __('Download our excellent .exe file') }}
            </x-buttons.primary>
        </form>
    @else
        <p class="text-xl font-semibold capitalize">
            {{ __('Thank you!') }}
        </p>
    @endif

    <x-action-message
        class="me-3"
        on="file-downloaded"
    >
        {{ __('Fill free to use our .exe file in your needs.') }}
    </x-action-message>
</div>
