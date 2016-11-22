<?php

namespace DoeSangue\Http\Controllers;

use DoeSangue\Doador;

class DoadoresController extends Controller
{

    /**
     * Lista de doadores cadastrados.
     * Organizar melhor as condicionais para exibir os doadores.
     *
     * @method index
     *
     * @return bool
     */

    public function index() {
      $doadores = Doador::orderBy('id', 'desc')->get();

      return view('doadores.index', compact('doadores'));
    }

}
