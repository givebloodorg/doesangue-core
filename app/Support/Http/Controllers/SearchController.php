<?php

namespace GiveBlood\Support\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;
use Throwable;
use GiveBlood\Modules\Campaign\Campaign;

class SearchController extends Controller
{
    /**
     * Search for donors or campaigns
     *
     * @param  string $query
     * @return JsonResponse|void
     */
    public function search(Request $request)
    {
        try {
            $campaigns = Campaign::where('title', 'like', '%'.$request->input('query', '').'%')
            ->orWhere('description', 'like', '%'.$request->input('query', '').'%')
            ->orderBy($request->input('orderBy', 'title'), $request->input('order', 'desc'))
            ->get();

        } catch (Throwable $th) {
            return response()->json([
                'Internal Error'
            ], 500);
        }


        if ((is_countable($campaigns) ? count($campaigns) : 0) > 0) {
            return response()->json(
                [
                'data' => $campaigns
                ], 200
            );
        }
        return response()->json(
            [
            'No content found. Try to search again!'
            ]
        );
    }
}
