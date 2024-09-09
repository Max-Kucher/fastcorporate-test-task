<?php

namespace App\Listeners;

use App\Enum\Events\EventNames;
use App\Events\LogoutEvent;
use App\Models\Event;

class LogoutListener
{
    /**
     * Handle the event.
     */
    public function handle(LogoutEvent $event): void
    {
        Event::create([
            'user_id' => $event->user->id,
            'action' => 'logout',
            'event_name' => EventNames::USER_LOGOUT->value,
        ]);
    }
}
