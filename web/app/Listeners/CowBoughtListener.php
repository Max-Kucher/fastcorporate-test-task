<?php

namespace App\Listeners;

use App\Enum\Events\EventNames;
use App\Events\CowBoughtEvent;
use App\Models\Event;

class CowBoughtListener
{
    /**
     * Handle the event.
     */
    public function handle(CowBoughtEvent $event): void
    {
        Event::create([
            'user_id' => $event->user->id,
            'page' => $event->page,
            'action' => 'button click',
            'event_name' => EventNames::BUY_A_COW->value,
        ]);
    }
}
