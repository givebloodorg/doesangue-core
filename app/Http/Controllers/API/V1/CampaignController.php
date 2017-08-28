<?php

namespace DoeSangue\Http\Controllers\API\V1;

use DoeSangue\Http\Requests\UpdateCampaignRequest;
use DoeSangue\Http\Requests\CreateCampaignRequest;
use DoeSangue\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use DoeSangue\Models\Donor;
use DoeSangue\Models\Campaign;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function index()
    {
        $campaigns = Campaign::with('owner')->with('comments')->paginate('12');

        return response()->json($campaigns, 200);
    }

    public function store(CreateCampaignRequest $request)
    {

        $user = JWTAuth::parseToken()->authenticate();

        $campaign = new Campaign();
        $campaign->title = $request[ 'title' ];
        $campaign->description = $request['description'];
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

    public function update(UpdateCampaignRequest $request, $id)
    {
        $campaign = Campaign::find($id);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $campaign->user_id) {
            return response()->json(
                [
                'message' => 'You haven\'t permission to update this entry'
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
              'email' => $campaign->owner->email,
              'username' => $campaign->owner->username
            ],
            'dates' => [
            'start_at' => $campaign->created_at->format('d-m-Y h:m:s'),
            'finish_at' => $campaign->expires->format('d-m-Y h:m:s')
            ]
            ], 200
        );
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $campaign->user_id) {
            return response()->json(
                [
                'message' => 'You haven\'t permission to delete this entry'
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
