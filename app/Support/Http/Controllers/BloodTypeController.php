<?php

namespace GiveBlood\Support\Http\Controllers;

use Illuminate\Http\JsonResponse;
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

    public function index(): JsonResponse
    {
        $bloodtypes = BloodType::all();

        return response()->json($bloodtypes, 200);
    }
}
