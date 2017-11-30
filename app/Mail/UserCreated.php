<?php

namespace DoeSangue\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DoeSangue\Models\User;

class UserCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
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
