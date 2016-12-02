<?php

namespace DoeSangue\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
public function __construct()
    {
<<<<<<< HEAD
        //  $this->middleware('auth');
||||||| merged common ancestors
        $this->middleware('auth');
=======
        //  $this->middleware('auth');

>>>>>>> 4c37c57
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
