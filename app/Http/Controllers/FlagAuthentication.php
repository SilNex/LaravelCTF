<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;

class FlagAuthentication extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkFlag(Challenge $challenge, Request $request)
    {
        if ($challenge->visible()) {
            if ($challenge->checkFlag($request->flag)) {
                if ($challenge->solveChallenge(auth()->user())) {
                    return response()
                        ->json($challenge->messages('correct_flag', true), 201);
                } else {
                    return response()
                        ->json($challenge->messages('already_solved', true), 208);
                }
            } else {
                return response()
                    ->json($challenge->messages('wrong_flag', true), 406);
            }
        } else {
            return response()
                ->json($challenge->messages('before_show_at', true), 403);
        }
    }
}
