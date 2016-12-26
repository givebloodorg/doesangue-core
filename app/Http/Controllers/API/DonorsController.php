<?php

namespace DoeSangue\Http\Controllers\API;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Donor;

class DonorsController extends Controller
{

    public function index()
    {
        $donors = Donor::with('user')->get();

        return response()->json($donors);
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
