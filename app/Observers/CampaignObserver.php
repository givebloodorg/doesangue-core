<?php

namespace DoeSangue\Observers;

use DoeSangue\Mail\CampaignPublished;
use DoeSangue\Models\Campaign;
use DoeSangue\Models\User;
use Illuminate\Support\Facades\Mail;

class CampaignObserver
{

  /**
   * Listen to campaign created/published.
   * @param Campaign $campaign
   */
  public function created(Campaign $campaign)
  {
      Mail::to($campaign->owner)->send(new CampaignPublished($campaign));
  }
}
