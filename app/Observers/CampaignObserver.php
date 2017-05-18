<?php

namespace DoeSangue\Observers;

use DoeSangue\Mail\CampaignPublished;
use DoeSangue\Models\Campaign;
use DoeSangue\Models\User;
use Illuminate\Support\Facades\Mail;

class CampaignObserver
{
    /**
     * Listen to the Campaign created event.
     *
     * @param Campaign $campaign
     */
    public function published(Campaign $campaign)
    {
        Mail::to($user->email)->send(new CampaignPublished($campaign));
    }

}
