<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('index', [
            'invitation' => $invitation
        ]);
    }
}
