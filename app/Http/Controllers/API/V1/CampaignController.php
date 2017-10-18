<?php

namespace DoeSangue\Http\Controllers\API\V1;

use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Campaign;

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
        $campaigns = Campaign::with('comments.commentator')->paginate('12');

        return response()->json($campaigns, 200);
    }

    /**
     * Get all details of a campaign
     *
     * @param  integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json(
                [
                    'error_code' => 404,
                    'error_message' => 'Campaign not found!'
                ], 404
            );
        }

        return response()->json(
            [
            'title' => $campaign->title,
            'owner' => [
              'first_name' => $campaign->owner->first_name,
              'last_name' => $campaign->owner->last_name,
              'username' => $campaign->owner->username
            ],
            'dates' => [
            'start_at' => $campaign->created_at->format('Y-m-d h:m:s'),
            'finish_at' => $campaign->expires
            ]
            ], 200
        );

    }

}
