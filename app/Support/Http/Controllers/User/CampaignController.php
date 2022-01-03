<?php

namespace GiveBlood\Support\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use GiveBlood\Support\Http\Controllers\Controller;

use GiveBlood\Modules\Campaign\Campaign;

class CampaignController extends Controller
{

    /**
     * Get all campaigns from current logged-in user.
     *
     * @return JsonResponse|void
     */
    public function all()
    {

        $user = JWTAuth::parseToken()->authenticate();

          // If the token is invalid
        if (!$user) {
            return response()->json([ 'invalid_user' ], 401);
        }

        $user->campaigns()->get();
    }

    /**
     * Create a new campaign
     *
     * @param  CreateCampaignRequest $request
     */
    public function store(CreateCampaignRequest $request): JsonResponse
    {

        $user = JWTAuth::parseToken()->authenticate();

        $campaign = new Campaign();
        $campaign->title = $request[ 'title' ];
        $campaign->description = $request[ 'description' ];
        $campaign->expires = $request[ 'expires' ];
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

    /**
     * Update details of a campaign
     *
     * @param  UpdateCampaignRequest $request
     */
    public function update(UpdateCampaignRequest $request, int $id): JsonResponse
    {
        $campaign = Campaign::find($id);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $campaign->user_id) {
            return response()->json(
                [
                'message' => "You haven't permission to update this entry"
                ], 401
            );
        }

        $campaign->title = $request[ 'title' ];
        $campaign->expires = $request[ 'expires' ];
        $campaign->description = $request[ 'description' ];
        $campaign->updated_at = Carbon::now();

        // Notify error in not found
        if (!$campaign) {
            return response()->json(
                [
                  'error_code' => '404',
                  'message' => 'Campaign not found!'
                ], 404
            );
        }

        // If validation pass: update the entry.
        $campaign->save();

        return response()->json(
            [
            'title' => $campaign->title,
            'owner' => [
              'first_name' => $campaign->owner->first_name,
              'last_name' => $campaign->owner->last_name,
              // 'email' => $campaign->owner->email,
              // 'username' => $campaign->owner->username
            ],
            'dates' => [
            'start_at' => $campaign->created_at->format('d-m-Y h:m:s'),
            'finish_at' => $campaign->expires->format('d-m-Y h:m:s')
            ]
            ], 200
        );
    }

    /**
     * Delete the campaign from platform.
     */
    public function destroy(int $id): JsonResponse
    {
        $campaign = Campaign::find($id);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $campaign->user_id) {
            return response()->json(
                [
                'message' => "You haven't permission to delete this entry"
                ], 401
            );
        }

        // Notify error in not found
        if (!$campaign) {
            return response()->json(
                [
                  'error_code' => 404,
                  'message' => 'Campaign not found!'
                ], 404
            );
        }

        $campaign->delete();

        return response()->json(
            [
            'message' => 'Campaign deleted'
            ], 204
        );
    }

}
