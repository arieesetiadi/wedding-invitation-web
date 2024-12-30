<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\T_Rsvp;
use App\Http\Resources\Rsvp\RsvpResource;
use App\Http\Requests\Rsvp\UpdateRequest;
use App\Http\Requests\Rsvp\StoreRequest;

class RsvpController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $page = $request->get('page', 1);
        $perPage = $request->get('perPage', 10);

        $query = T_Rsvp::where('greetings', '!=', null);
        $remaining = $query->count() - ($page * $perPage);

        $rsvps = RsvpResource::collection(
            $query->skip(($page * $perPage) - $perPage)
                ->limit($perPage)
                ->latest()
                ->get()
        );

        return response()->json([
            'rsvps' => $rsvps,
            'remaining' => max($remaining, 0),
        ]);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        T_Rsvp::create($request->validated());

        return response()->json([], Response::HTTP_CREATED);
    }

    public function check(string $invitationId): JsonResponse
    {
        $exists = T_Rsvp
            ::query()
            ->where('invitation_id', $invitationId)
            ->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }

    public function checkWishes(string $invitationId): JsonResponse
    {
        $exists = T_Rsvp
            ::query()
            ->where('invitation_id', $invitationId)
            ->where('greetings', '!=', null)
            ->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
}
