<?php

namespace DoeSangue;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Tabela usada pelo model Post.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Campos da tabela 'posts' que serão diretamente usados pelo Model.
     *
     * @var array
     */
    protected $filliable = [ 'titulo', 'conteudo', 'imagem', 'autor_id' ];
}
