<?php

namespace App\Http\Controllers;

use App\Models\T_Invitation;
use Illuminate\Http\JsonResponse;

class InvitationController extends Controller
{
    public function generate(): JsonResponse
    {
        $invitations = T_Invitation
            ::query()
            ->latest()
            ->published()
            ->get();
            
        $invitationsUrls = $invitations->map(function (T_Invitation $invitation) {
            return url('/?guest=' . $invitation->invitation_code);
        });

        return response()->json($invitationsUrls);
    }
}
