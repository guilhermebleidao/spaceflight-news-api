<?php

namespace Database\Seeders;

use App\Models\Launch;
use Illuminate\Database\Seeder;

class LaunchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $launchesJson = '[
            {
                "id": "l4unc8-1d-o1",
                "provider": "Launch provider 01"
            },
            {
                "id": "l4unc8-1d-o2",
                "provider": "Launch provider 02"
            },
            {
                "id": "l4unc8-1d-o3",
                "provider": "Launch provider 03"
            },
            {
                "id": "l4unc8-1d-o4",
                "provider": "Launch provider 04"
            },
            {
                "id": "l4unc8-1d-o5",
                "provider": "Launch provider 05"
            }
        ]';

        $launches = json_decode($launchesJson);
        foreach ($launches as $launch) {
            Launch::updateOrCreate(
                ['id' => $launch->id],
                [
                    'id' => $launch->id,
                    'provider' => $launch->provider
                    ]
            );
        }
    }
}
