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
        $this->user = factory(User::class)->create();
    }

    /** @test */
    function indexChallenge()
    {
        $challenge = factory(Challenge::class, 10)->create();

        $this
            ->actingAs($this->admin)
            ->json('GET', '/challenges')
            ->assertStatus(200);
        
        $this
            ->actingAs($this->user)
            ->json('GET', '/challenges')
            ->assertStatus(403);
    }

    /** @test */
    function createChallenge()
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
                'message',
                'id',
            ]);

        $this
            ->assertDatabaseHas('challenges', [
                'title' => $challenge->title,
                'flag' => $challenge->flag,
                'description' => $challenge->description,
            ]);
    }

    /** @test */
    function updateChallenge()
    {
        $oldChallenge = factory(Challenge::class)
            ->create();

        $newChallenge = factory(Challenge::class)
            ->make()
            ->makeVisible('flag');

        $response = $this
            ->actingAs($this->admin)
            ->json('PUT', "/challenges/{$oldChallenge->id}", $newChallenge->toArray());

        $response
            ->assertStatus(202)
            ->assertJsonStructure([
                'message',
                'id',
            ]);

        $this
            ->assertDatabaseHas('challenges', [
                'id' => $oldChallenge->id,
                'title' => $newChallenge->title,
                'flag' => $newChallenge->flag
            ]);
    }

    /** @test */
    function deleteChallenge()
    {
        $challenge = factory(Challenge::class)
            ->create();
        
        $response = $this
            ->actingAs($this->admin)
            ->json('DELETE', "/challenges/{$challenge->id}");
        
        $response
            ->assertStatus(202)
            ->assertJsonStructure([
                'message',
            ]);
        
        $this
            ->assertDatabaseMissing('challenges', $challenge->toArray());
    }
}
