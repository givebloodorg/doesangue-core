<?php

namespace DoeSangue\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoasVindas extends Mailable
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
        return $this->view('email.boasvindas')
                    ->with([
                      'Nome' => $this->user->name,
                      'UserName' => $this->user->username,
                  ]);
    }
}
