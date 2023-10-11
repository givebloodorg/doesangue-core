<?php

namespace GiveBlood\Support\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use GiveBlood\Support\Http\Controllers\Controller;
use JWTAuth;
use GiveBlood\Modules\Campaign\Campaign;
use Illuminate\Http\Request;;
use Carbon\Carbon;

class CampaignController extends Controller
{

    /**
     * Get all campaigns from current logged-in user.
     *
     * @return JsonResponse|void
     */
    public function index()
    {

        $user = JWTAuth::parseToken()->authenticate();

          // If the token is invalid
        if (!$user) {
            return response()->json([ 'invalid_user' ], 401);
        }

       return  $user->campaigns()->get();
    }

    // /**
    // * Create a new campaign
    // *
    // * @param  CreateCampaignRequest $request
    // */
    public function store(Request $request): JsonResponse
    {

        $user = JWTAuth::parseToken()->authenticate();

        $campaign = new Campaign();
        $campaign->title = $request[ 'title' ];
        $campaign->description = $request[ 'description' ];
        $campaign->due_date=$request['due_date'];
        $campaign->slug='';
       // $campaign->expires = $request[ 'expires' ];
        //        $campaign->user_id = $request[ 'user_id' ];
        // use auth guard instead of $request['user_id'].
        $campaign->user_id = $user->id;
        $campaign->created_at = Carbon::now();
        $campaign->save();

        // Send mail to users about the new campaign.
        //       Mail::to($campaign->owner->email)->send(new CampaignPublished($campaign));

        return response()->json(
            [
            'status_code' => 201,
            'message' => 'Campaign added!'
            ], 201
        );

    }

    // /**
    // * Update details of a campaign
    // *
    // * @param  UpdateCampaignRequest $request
    // */
    public function update($campaign, Request $request): JsonResponse
    {
        $campaign_data = Campaign::find($campaign);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $campaign_data->user_id) {
            return response()->json(
                [
                'message' => "You haven't permission to update this entry"
                ], 401
            );
        }

        $campaign_data->title = $request[ 'title' ];
        //$campaign_data->expires = $request[ 'expires' ];
        $campaign_data->description = $request[ 'description' ];
        $campaign_data->updated_at = Carbon::now();

        // Notify error in not found
        if (!$campaign_data) {
            return response()->json(
                [
                  'error_code' => '404',
                  'message' => 'Campaign not found!'
                ], 404
            );
        }

        // If validation pass: update the entry.
        $campaign_data->save();

        return response()->json(
            [
            'title' => $campaign_data->title,
            'owner' => [
              'first_name' => $campaign_data->owner->first_name,
              'last_name' => $campaign_data->owner->last_name,
              // 'email' => $campaign->owner->email,
              // 'username' => $campaign->owner->username
            ],
            'dates' => [
            'start_at' => Carbon::parse($campaign_data->created_at)->format('d-m-Y h:m:s'),
            //'finish_at' => $campaign_data->expires->format('d-m-Y h:m:s')
            ]
            ], 200
        );
    }

    /**
     * Delete the campaign from platform.
     */
    public function destroy($campaign): JsonResponse
    {
        $campaign_data = Campaign::find($campaign);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $campaign_data->user_id) {
            return response()->json(
                [
                'message' => "You haven't permission to delete this entry"
                ], 401
            );
        }

        // Notify error in not found
        if (!$campaign_data) {
            return response()->json(
                [
                  'error_code' => 404,
                  'message' => 'Campaign not found!'
                ], 404
            );
        }

        $campaign_data->delete();

        return response()->json(
            [
            'message' => 'Campaign deleted'
            ], 200
        );
    }

}
