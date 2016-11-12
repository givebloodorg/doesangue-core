<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */
namespace DoeSangue\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
