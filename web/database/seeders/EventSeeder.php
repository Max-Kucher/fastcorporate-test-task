<?php

namespace Database\Seeders;

use App\Enum\Events\EventNames;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Event::factory()->create([
            'user_id' => $user->id,
            'action' => 'login',
            'page' => null,
            'event_name' => EventNames::USER_LOGIN,
        ]);

        Event::factory()->create([
            'user_id' => $user->id,
            'action' => 'logout',
            'page' => null,
            'event_name' => EventNames::USER_LOGOUT,
        ]);
    }
}
