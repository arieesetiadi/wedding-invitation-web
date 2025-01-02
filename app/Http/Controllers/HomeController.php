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

        $today = Carbon::now()->startOfDay();
        $eventDay = Carbon::make('2025-02-15')->startOfDay();
        $countdown = $today->diffInDays($eventDay);

        $isHappening = $eventDay->eq($today);
        $isPassed = $eventDay->addDay(1)->eq($today);

        return view('index', [
            'invitation' => $invitation,
            'countdown' => $countdown,
            'isHappening' => $isHappening,
            'isPassed' => $isPassed,
        ]);
    }
}
