<?php

namespace GiveBlood\Support\Http\Controllers;

use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Modules\Campaign\Campaign;
use GiveBlood\Units\Core\Http\Resources\Campaign as CampaignResource;
use GiveBlood\Units\Core\Http\Resources\CampaignCollection;
use Illuminate\Http\JsonResponse;

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
     */
    public function index(): CampaignCollection
    {
        return new CampaignCollection(Campaign::paginate(30));
    }

    /**
     * Get all details of a campaign
     */
    public function show($campaign): CampaignResource | JsonResponse
    {
        $campaign_data =Campaign::find($campaign);

        if($campaign_data == NULL){
            return response()->json(
                [
                'No content found. Try to search again!'
                ], 404
            );
        }

        return new CampaignResource($campaign_data);

    }

}
