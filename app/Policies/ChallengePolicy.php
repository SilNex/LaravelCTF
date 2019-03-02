<?php

namespace App\Policies;

use App\User;
use App\Challenge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChallengePolicy
{
    use HandlesAuthorization;
    
    public function view(?User $user, Challenge $challenge)
    {
        return true;
    }
}
