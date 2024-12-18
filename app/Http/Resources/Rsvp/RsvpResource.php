<?php

namespace App\Http\Resources\Rsvp;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class RsvpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'full_name' => $this->full_name,
            'attendance' => $this->attendance,
            'greetings_escaped' => $this->greetings_escaped,
            'create_date_diff' => $this->create_date_diff,
        ];
    }
}
