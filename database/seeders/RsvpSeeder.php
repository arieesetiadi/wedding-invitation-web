<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\T_Rsvp;
use App\Models\T_Invitation;

class RsvpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invitations = T_Invitation::all();

        foreach ($invitations as $i => $invitation) {
            T_Rsvp::create([
                'invitation_id' => $invitation->invitation_id,
                'full_name' => $invitation->guest_name,
                'phone' => fake()->phoneNumber,
                'attendance' => random_int(0, 1),
                'num_guest' => $invitation->num_guest,
                'greetings' => fake()->text(250),
                'create_date' => now()->subDays(1)->addMinutes($i)
            ]);
        }
    }
}
