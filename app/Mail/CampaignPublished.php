<?php

namespace DoeSangue\Mail;

use DoeSangue\Models\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CampaignPublished extends Mailable
{
    use Queueable, SerializesModels;

    protected $campaign;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.campaign-published')
            ->with(
                [
                        'title' => $this->campaign->title,
                        'expires' => $this->campaign->expires,
                        ]
            );
    }
}
