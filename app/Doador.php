<?php

namespace DoeSangue;

use Illuminate\Database\Eloquent\Model;

class Doador extends Model
{
    protected $table = 'doadores';

    protected $filliable = [ 'user_id', 'bio', 'id_tiposanguineo' ];
}
