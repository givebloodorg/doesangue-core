<?php

namespace DoeSangue\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DoeSangue\Models\User;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
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
                        'FirstName' => $this->user->first_name,
                        'LastName' => $this->user->last_name,
                        'UserName' => $this->user->username
                      ]
                    );
    }
}
