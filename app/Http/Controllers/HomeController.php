<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */
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
        $this->middleware('auth');
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
