<?php

namespace GiveBlood\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use GiveBlood\Modules\Campaign\Campaign;

class CampaignPublished extends Mailable implements ShouldQueue
{
    use Queueable;

    use SerializesModels;
    /**
     * Create a new message instance.
     *
     */
    public function __construct(protected Campaign $campaign)
    {
    }

    /**
     * Build the message.
     */
    public function build(): static
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
