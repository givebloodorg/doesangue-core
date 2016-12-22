<?php

namespace DoeSangue\Http\Controllers\API;

use Illuminate\Http\Request;
use DoeSangue\Http\Requests\CreateCampaignRequest;
use DoeSangue\Http\Requests\UpdateCampaignRequest;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        return response()->json(compact('campaigns'));
    }

    public function store(CreateCampaignRequest $request)
    {
        $campaign = new Campaign();
        $campaign->title = $request[ 'title' ];
        $campaign->expires = $request[ 'expires' ];
        $campaign->save();

        return response()->json(compact('campaign')->with('message', 'Campaign stored sucessfully'));
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

        return response()->json($campaign)->with('message', 'Campanha atualizada');
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        $campaign->delete();

        return response()->json('message', 'Campaign deleted');
    }
}
