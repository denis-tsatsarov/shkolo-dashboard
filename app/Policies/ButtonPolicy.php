<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Button;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ButtonPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Button $button)
    {
        return $user->id === $button->user_id 
            ? Response::allow() 
            : Response::deny('You are not authorized to execute this action!');
    }
}
