<?php

namespace GiveBlood\Support\Http\Controllers;

use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Modules\Blood\BloodType;

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
