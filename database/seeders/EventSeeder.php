<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventsJson = '[
            {
                "id": "3v3nt-1d-o1",
                "provider": "Event provider 01"
            },
            {
                "id": "3v3nt-1d-o2",
                "provider": "Event provider 02"
            },
            {
                "id": "3v3nt-1d-o3",
                "provider": "Event provider 03"
            },
            {
                "id": "3v3nt-1d-o4",
                "provider": "Event provider 04"
            },
            {
                "id": "3v3nt-1d-o5",
                "provider": "Event provider 05"
            }
        ]';

        $events = json_decode($eventsJson);
        foreach ($events as $event) {
            Event::updateOrCreate(
                ['id' => $event->id],
                [
                    'id' => $event->id,
                    'provider' => $event->provider
                    ]
            );
        }
    }
}
