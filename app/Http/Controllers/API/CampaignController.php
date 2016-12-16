<?php

namespace DoeSangue\Http\Controllers\Api;

use Illuminate\Http\Request;
use DoeSangue\Http\CreateCampaignRequest;
use DoeSangue\Http\UpdateCampaignRequest;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\MOdels\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        return response()->json(compact($campaigns));
    }
}
