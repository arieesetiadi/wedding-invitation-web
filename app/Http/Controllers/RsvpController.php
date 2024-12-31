<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use App\Models\T_Rsvp;
use App\Http\Resources\Rsvp\RsvpResource;
use App\Http\Requests\Rsvp\StoreRequest;

class RsvpController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $rsvps = RsvpResource::collection(
            T_Rsvp::query()
                ->when($request->limit, function (Builder $builder, int $limit) {
                    $builder->limit($limit);
                })
                ->latest()
                ->get()
        );

        $remaining = max(T_Rsvp::count() - ($request->limit ?? 0), 0);

        return response()->json([
            'rsvps' => $rsvps,
            'remaining' => $remaining,
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
}
