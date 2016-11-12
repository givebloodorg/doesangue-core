<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */
namespace DoeSangue\Http\Controllers;

use DoeSangue\Doadores;

class DoadoresController extends Controller
{

  public function index(){
    return Doadores::all();
  }

    public function show($id){
      return Doadores::findOrFail($id);
    }
}
