<?php

namespace DoeSangue\Http\Controllers\API;

use Illuminate\Http\Request;
use DoeSangue\Http\Requests\UpdateCampaignRequest;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Campaign;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function index()
    {
        $campaigns = Campaign::all();

        return response()->json(compact('campaigns'));
    }

    public function store(Request $request)
    {
      $this->validate($request,
        [
          'title' => 'required|min:60',
            'expires' => 'required|date',
            'id_user' => 'required|integer',
        ]);

        $campaign = new Campaign();
        $campaign->title = $request[ 'title' ];
        $campaign->expires = $request[ 'expires' ];
        $campaign->id_user = $request[ 'id_user' ];
        $campaign->save();

        return response()->json($campaign, 201);
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);

        return response()->json(compact('campaign'));
    }

    public function update(UpdateCampaignRequest $request, $id)
    {
        $campaign = Campaign::find($id);
        $campaign->title = $request[ 'title' ];
        $campaign->expires = $request[ 'expires' ];
        $campaign->save();

        return response()->json($campaign);
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        // Notify error in not found
        if (!$campaign) {
            return response()->json(
                [
                  'error_code' => '404',
                  'message' => 'Campaign not found!'
                ], 404
            );
        }
        $campaign->delete();

        return response()->json([
          'title' => $campaign->title,
          'id_user' => $campaign->id_user,
          'status' => 'deleted'
          ]);
    }

    /**
     * Get campaigns by specific donor/user
     * @return Response
     */
    public function campaigns(Donor $id) {

      $donor = Donor::find($id);
      $campaigns = Campaigns::where('id_user', $donor->id)->get();
    }
}
