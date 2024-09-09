<?php

namespace App\Listeners;

use App\Enum\Events\EventNames;
use App\Events\FileDownloadedEvent;
use App\Models\Event;

class FileDownloadedListener
{
    /**
     * Handle the event.
     */
    public function handle(FileDownloadedEvent $event): void
    {
        Event::create([
            'user_id' => $event->user->id,
            'page' => $event->page,
            'action' => 'file download',
            'event_name' => EventNames::EXE_DOWNLOAD->value,
        ]);
    }
}
