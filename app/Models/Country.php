<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use DoeSangue\Uuids;

class Country extends Model
{
    use Uuids;

    protected $table = 'countries';

    protected $filliable = [ 'country_name', 'country_code' ];
}
