<?php

namespace DoeSangue\Http\Controllers\API\V1;

use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\BloodType;

class BloodTypeController extends Controller
{
    /**
     * Initialize the class
     * and set the middleware
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'index' ] ]);
    }

    public function index()
    {
        $bloodtypes = BloodType::all();

        return response()->json($bloodtypes, 200);
    }
}
