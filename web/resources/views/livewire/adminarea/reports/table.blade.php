<?php

use App\Enum\Events\EventNames;
use Livewire\Volt\Component;

new class extends Component {
    public array $events;
}; ?>

<x-tables.table>
    <x-slot name="head">
        <tr>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __('Date') }}
            </th>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __(EventNames::USER_LOGIN->value) }}
            </th>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __(EventNames::USER_LOGOUT->value) }}
            </th>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __(EventNames::BUY_A_COW->value) }}
            </th>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __(EventNames::EXE_DOWNLOAD->value) }}
            </th>
        </tr>
    </x-slot>

    <x-slot name="body">
        @foreach ($events as $date => $eventCounts)
            <tr class="border-b">
                <td class="px-4 py-3">
                    {{ $date }}
                </td>
                <td class="px-4 py-3">
                    {{ $eventCounts['login'] }}
                </td>
                <td class="px-4 py-3">
                    {{ $eventCounts['logout'] }}
                </td>
                <td class="px-4 py-3">
                    {{ $eventCounts['clickBuyCow'] }}
                </td>
                <td class="px-4 py-3">
                    {{ $eventCounts['clickDownload'] }}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-tables.table>
