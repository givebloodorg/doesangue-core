<?php

namespace DoeSangue\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DoeSangue\Models\Campaign;

class CampaignPublished extends Mailable implements ShouldQueue
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
        return $this->markdown('email.campaigns.published')
                    ->with(
                      [
                       'CampTitle' => $this->campaign->title,
                       'CampOwner' => $this->campaign->owner,
                       'CampCreated' => $this->campaign->created_at->format('d-m-Y'),
                       'CampExpiration' => $this->campaign->expires->format('d-m-Y')
                      ]
                    );
    }
}
