<?php

namespace DoeSangue\Mail;

use DoeSangue\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
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
        return $this->view('email.user-created')
            ->with(
                [
                  'Nome' => $this->user->name,
                  'UserName' => $this->user->username,
                ]
            );
    }
}
