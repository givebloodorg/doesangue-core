<?php

namespace DoeSangue\Http\Controllers\Api;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Donor;

class DonorsController extends Controller
{

    public function index()
    {
        $donors = Donor::orderBy('id', 'asc')->get();

        return response()->json(compact('donors'));
    }
}
