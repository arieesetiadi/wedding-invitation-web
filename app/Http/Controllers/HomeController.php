<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\T_Invitation;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $invitation = T_Invitation
            ::query()
            ->where('invitation_code', $request->guest)
            ->published()
            ->first();

        $countdown = Carbon
            ::now()
            ->startOfDay()
            ->diffInDays(
                Carbon
                    ::make('2025-02-15')
                    ->startOfDay()
            );

        return view('index', [
            'invitation' => $invitation,
            'countdown' => $countdown,
        ]);
    }
}
