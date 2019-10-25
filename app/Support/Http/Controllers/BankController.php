<?php

namespace GiveBlood\Support\Http\Controllers;

use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Units\Core\Http\Resources\BanksCollection;
use GiveBlood\Units\Core\Http\Resources\Bank as BankResource;
use GiveBlood\Modules\Bank\Bank;

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
