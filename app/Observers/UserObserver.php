<?php

namespace GiveBlood\Observers;

use GiveBlood\Mail\UserCreated;
use GiveBlood\Modules\Users\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Listen to the User created event.
     */
    public function created(User $user): void
    {
        Mail::to($user->email)->send(new UserCreated($user));
    }
}
