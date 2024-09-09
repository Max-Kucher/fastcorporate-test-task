<?php

namespace App\Livewire\Actions;

use App\Events\LogoutEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        LogoutEvent::dispatch(auth()->user());

        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
    }
}
