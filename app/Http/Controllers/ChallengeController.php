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
        // $this->middleware('admin')->except('index');
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
     * @param  \Illuminate\Http\StoreChallenge  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChallenge $request)
    {

        $challenge = $request->validated();

        return response()
            ->json([
                'message' => __('challenge.created'),
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
        return response()
            ->json($challenge->content(), $challenge->status());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreChallenge  $request
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChallenge $request, Challenge $challenge)
    {
        $newChallenge = $request->validated();

        $challenge->update($newChallenge);

        return response()
            ->json([
                'message' => $challenge->messages('updated'),
                'id' => $challenge->id,
            ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        $challenge->delete();
        return response()
            ->json([
                'message' => $challenge->messages('deleted'),
            ], 202);
    }
}
