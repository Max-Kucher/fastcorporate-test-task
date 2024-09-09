<?php

use App\Enum\Events\EventNames;
use Illuminate\Contracts\View\View;
use App\Models\Event;
use Livewire\Volt\Component;
use Livewire\WithPagination;


new class extends Component {
    use WithPagination;

    public array $eventNamesFilter = [];

    public function runFilters(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $eventsQuery = Event::query();

        if (!empty($this->eventNamesFilter)) {
            $eventsQuery->whereIn('event_name', $this->eventNamesFilter);
        }

        return view('livewire.adminarea.statistics', [
            'events' => $eventsQuery->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
};

?>

<x-tables.table>
    <x-slot name="filters">
        <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <div
                x-data="{ open: false }"
                class="flex items-center space-x-3 w-full md:w-auto relative"
            >
                <button
                    @click="open = !open"
                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200"
                    type="button"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Filter
                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                    </svg>
                </button>
                <form
                    x-show="open"
                    @click.away="open = false"
                    class="z-10 w-48 p-3 bg-white rounded-lg shadow absolute top-[calc(100%+10px)] right-0"
                    style="display:none"
                    wire:submit="runFilters"
                >
                    <div class="mb-3 text-sm font-medium text-gray-900">
                        Choose event name
                    </div>
                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                        @foreach (EventNames::cases() as $eventName)
                            @php
                                $id = md5($eventName->value);
                            @endphp

                            <li class="flex items-center">
                                <input
                                    id="{{ $id }}"
                                    type="checkbox"
                                    wire:model="eventNamesFilter"
                                    value="{{ $eventName->value }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500"
                                >
                                <label
                                    for="{{ $id }}"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                >
                                    {{ mb_ucfirst($eventName->value) }}
                                </label>
                            </li>
                        @endforeach
                    </ul>

                    <x-buttons.primary class="mt-3">
                        Search
                    </x-buttons.primary>
                </form>
            </div>
        </div>
    </x-slot>

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
                {{ __('Event name') }}
            </th>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __('Action') }}
            </th>
            <th
                scope="col"
                class="px-4 py-3"
            >
                {{ __('User') }}
            </th>
        </tr>
    </x-slot>

    <x-slot name="body">
        @if ($events->count() === 0)
            <tr class="border-b">
                <td
                    class="px-4 py-3"
                    colspan="4"
                >
                    <div class="min-h-32">
                        {{ __('No events found.') }}
                    </div>
                </td>
            </tr>
        @else
            @foreach ($events as $event)
                <tr class="border-b">
                    <th scope="row"
                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"
                    >
                        {{ $event->created_at }}
                    </th>
                    <td class="px-4 py-3">
                        {{ $event->event_name }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $event->action }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $event->user->name }}
                    </td>
                </tr>
            @endforeach
        @endif
    </x-slot>

    <x-slot name="pagination">
        {{ $events->links()  }}
    </x-slot>
</x-tables.table>

