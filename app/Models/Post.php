<?php

namespace DoeSangue\Models;

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
    protected $filliable = [
        'user_id',
        'title',
        'content',
        'image',
    ];

    /**
     * Related.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
