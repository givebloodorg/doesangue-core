<?php

namespace GiveBlood\Support\Http\Controllers;

use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;

use GiveBlood\Modules\Campaign\Campaign;

class SearchController extends Controller
{
    /**
     * Search for donors or campaigns
     *
     * @param  string $query
     * @return void
     */
    public function search(Request $request)
    {
        $campaigns = Campaign::where('title', 'like', '%'.$request->input('query').'%')
                               ->orWhere('description', 'like', '%'.$request->input('query').'%')
                               ->orderBy($request->input('orderBy'), $request->input('order'))
                               ->get();

        if (count($campaigns) > 0) {
            return response()->json(
                [
                'data' => $campaigns
                ], 200
            );
        } else {
            return response()->json(
                [
                'No content found. Try to search again!'
                ]
            );
        }
    }
}
