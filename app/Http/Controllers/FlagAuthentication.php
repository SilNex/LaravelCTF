<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;

class FlagAuthentication extends Controller
{
    public function checkFlag(Challenge $challenge, Request $request)
    {
        return $challenge->checkFlag($request->flag);
    }
}
