<?php

namespace DoeSangue\Http\Controllers\API\V1;

use DoeSangue\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DoeSangue\Http\Resources\BanksCollection;
use DoeSangue\Http\Resources\Bank as BankResource;
use DoeSangue\Models\Bank;

class BankController extends Controller
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
      return new BanksCollection(Bank::paginate(20));
    }

    public function show($bank)
    {
      return new BankResource(Bank::find($bank));
    }
}
