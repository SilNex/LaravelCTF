<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Challenge;
use App\User;

class ChallengeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(User::class)->create([
            'privilege' => 10,
        ]);
    }

    /** @test */
    function create_challenge()
    {
        $challenge = factory(Challenge::class)
            ->make()
            ->makeVisible('flag');

        $response = $this
            ->actingAs($this->admin)
            ->json('POST', '/challenges', $challenge->toArray());

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
            ]);

        $this
            ->assertDatabaseHas('challenges', [
                'title' => $challenge->title,
                'description' => $challenge->description,
            ]);

        $this
            ->assertDatabaseMissing('challenges', [
                'flag' => $challenge->flag,
            ]);
    }

    /** @test */
    function update_challenge()
    {
        $oldChallenge = factory(Challenge::class)
            ->create();

        $newChallenge = factory(Challenge::class)
            ->make()
            ->makeVisible('flag');

        $response = $this
            ->actingAs($this->admin)
            ->json('PUT', "/challenge/{$oldChallenge->id}", $newChallenge);
        
        $response
            ->assertStatus(202)
            ->assertJsonStructure([
                'updated' => 'true',
            ]);

        $this
            ->assertDatabaseHas('challenges', [
                'id' => $oldChallenge->id,
                'title' => $newChallenge->title,
                'flag' => $newChallenge->flag
            ]);
    }
}
