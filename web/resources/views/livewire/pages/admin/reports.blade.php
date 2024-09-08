<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.default')] class extends Component
{

}

?>

<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Reports') }}
    </h1>
</x-slot>

<x-container>
    <p>reports</p>
</x-container>
