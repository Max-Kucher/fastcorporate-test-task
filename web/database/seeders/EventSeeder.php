<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'page' => 'Page A',
            'button' => null,
        ]);

        Event::factory()->create([
            'user_id' => $user->id,
            'action' => 'button-click',
            'page' => 'Page B',
            'button' => 'Download',
        ]);
    }
}
