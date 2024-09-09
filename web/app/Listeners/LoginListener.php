<?php

namespace App\Listeners;

use App\Enum\Events\EventNames;
use App\Events\LoginEvent;
use App\Models\Event;

class LoginListener
{
    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event): void
    {
        Event::create([
            'user_id' => $event->user->id,
            'action' => 'login',
            'event_name' => EventNames::USER_LOGIN->value,
        ]);
    }
}
