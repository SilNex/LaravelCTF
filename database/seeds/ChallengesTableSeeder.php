<?php

use Illuminate\Database\Seeder;
use App\User;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Challenge::class, 10)->create();
    }
}
