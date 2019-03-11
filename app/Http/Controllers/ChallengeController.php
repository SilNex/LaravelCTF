<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChallenge;

class ChallengeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::all();
        $this->authorize('view', $challenges->random());
        return response()
                    ->json($challenges);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChallenge $request)
    {
        $challenge = $request->validated();
        $challenge['flag'] = hash('sha256', $request->flag);

        return response()
                    ->json([
                        'id' => Challenge::create($challenge)->id,
                    ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        if (now() < $challenge->show_at) {
            return response(403)->json([
                'message' => __('challenge.before_show_at', [
                    'date' => $challenge->show_at
                ]),
            ]);
        } else {
            return response()
                        ->json($challenge);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //
    }
}
