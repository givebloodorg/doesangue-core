<?php
namespace DoeSangue\Observers;

use DoeSangue\Mail\UserCreated;
use DoeSangue\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        Mail::to($user->email)->send(new UserCreated($user));
    }
}