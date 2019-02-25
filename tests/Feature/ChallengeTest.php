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

    public function setUp()
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
            ->makeVisible('flag')
            ->toArray();

        $response = $this
            ->actingAs($this->admin)
            ->post('/challenges', $challenge);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);

        $this
            ->assertDatabaseHas('challenges', [
                'title' => $challenge->title,
                'flag' => $challenge->flag,
            ]);
    }
}
