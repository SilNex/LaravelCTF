<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;

class FlagAuthentication extends Controller
{
    public function compareFlag(Challenge $challenge, Request $request)
    {
        dd($challenge);
        return $challenge->flag === $request->flag;
    }
}
