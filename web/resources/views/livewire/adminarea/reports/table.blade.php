<?php

use App\Enum\Events\EventNames;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use App\Models\Event;
use Livewire\Attributes\Computed;

new class extends Component {

    #[Computed]
    public function events(): Collection
    {
        return Event::all()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });
    }

    #[Computed]
    public function preparedEvents(): array
    {
        $eventsByDate = $this->events;

        $preparedData = [];

        foreach ($eventsByDate as $date => $events) {
            $preparedData[$date] = [
                'login' => $events->where('event_name', EventNames::USER_LOGIN->value)->count(),
                'logout' => $events->where('event_name', EventNames::USER_LOGOUT->value)->count(),
                'clickBuyCow' => $events->where('event_name', EventNames::BUY_A_COW->value)->count(),
                'clickDownload' => $events->where('event_name', EventNames::EXE_DOWNLOAD->value)->count(),
            ];
        }

        return $preparedData;
    }
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
        @foreach ($this->preparedEvents as $date => $eventCounts)
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
