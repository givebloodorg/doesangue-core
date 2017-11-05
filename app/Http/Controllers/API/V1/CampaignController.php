<?php

namespace DoeSangue\Http\Controllers\API\V1;

use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Campaign;
use DoeSangue\Http\Resources\Campaign as CampaignResource;
use DoeSangue\Http\Resources\CampaignCollection;


class CampaignController extends Controller
{
    /**
     * Initialize the class
     * and set the middleware
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    /**
     * Get all campaigns
     * 20 queries per page
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return new CampaignCollection(Campaign::paginate(30));
    }

    /**
     * Get all details of a campaign
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($campaign)
    {

        return new CampaignResource(Campaign::find($campaign));

    }

}
