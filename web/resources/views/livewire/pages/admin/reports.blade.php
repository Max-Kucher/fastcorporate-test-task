<?php

use App\Enum\Events\EventNames;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use App\Models\Event;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

new #[Layout('layouts.default')] class extends Component
{
    public string $graphHtmlId = 'reports-graph';

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
}

?>

<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Reports') }}
    </h1>
</x-slot>

<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <livewire:adminarea.reports.graph
                    :htmlId="$graphHtmlId"
                    :events="$this->preparedEvents"
                />
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <livewire:adminarea.reports.table :events="$this->preparedEvents" />
        </div>
    </div>
</div>
