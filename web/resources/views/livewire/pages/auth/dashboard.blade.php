<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{

}; ?>

<div>
    <h1 class="text-xl capitalize font-semibold">{{ __('You are logged in.') }}</h1>
</div>
