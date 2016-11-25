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
<<<<<<< HEAD:app/Mail/BoasVindas.php
        return $this->view('email.boasvindas')
            ->with(
                [
                        'Nome' => $this->user->name,
                        'UserName' => $this->user->username,
                        ]
            );
=======
        return $this->view('email.user-created')
                    ->with([
                      'Nome' => $this->user->name,
                      'UserName' => $this->user->username,
                  ]);
>>>>>>> 2997d6b361ca1e02741c8daf8458d44b41d8a305:app/Mail/UserCreated.php
    }
}
