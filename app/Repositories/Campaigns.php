<?php

namespace DoeSangue\Repositories;
use DoeSangue\Models\Campaign;

class Campaigns
{

    public $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function all()
    {
        return $this->all();
    }

    public function findByOwner($owner)
    {
        return $this->where('user_id', $owner)->get();
    }

}
