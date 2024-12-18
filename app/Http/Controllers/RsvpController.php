<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\T_Rsvp;
use App\Http\Resources\Rsvp\RsvpResource;
use App\Http\Requests\Rsvp\StoreRequest;

class RsvpController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $rsvps = RsvpResource::collection(
            T_Rsvp::query()
                ->limit($request->limit)
                ->latest()
                ->get()
        );

        return response()->json([
            'rsvps' => $rsvps
        ]);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['greetings'] = strip_tags($validated['greetings']);

        T_Rsvp::create($validated);

        return response()->json([], Response::HTTP_CREATED);
    }

    public function check(string $invitationId): JsonResponse
    {
        $exists = T_Rsvp
            ::query()
            ->where('invitation_id', $invitationId)
            ->exists();

        return response()->json([
            'exists'=> $exists
        ]);
    }
}
