<?php

namespace DoeSangue\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Donor;

class DonorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function index()
    {
        $donors = Donor::with('user')->get();

        return response()->json($donors, 200);
    }

    public function show($id)
    {

        $donor = Donor::find($id);

        if (! $donor) {
            return response()->json(
                [
                    'error_code' => 404,
                    'error_message' => 'Donor not found!'
                ], 404
            );
        }

        return response()->json(
            [
                'first_name' => $donor->user->first_name,
                'last_name' => $donor->user->last_name,
                'email' => $donor->user->email,
                'birthdate' => $donor->user->birthdate,
            ]
        );
    }

    public function store()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
