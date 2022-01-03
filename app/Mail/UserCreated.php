<?php

namespace GiveBlood\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use GiveBlood\Modules\Users\User;

class UserCreated extends Mailable implements ShouldQueue
{
    use Queueable;

    use SerializesModels;

    /**
     * Create a new message instance.
     *
     */
    public function __construct(protected User $user)
    {
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->markdown('email.users.created')
            ->with(
                [
                        'FirstName' => $this->user->first_name,
                        'LastName' => $this->user->last_name,
                        'UserName' => $this->user->username
                        ]
            );
    }
}
