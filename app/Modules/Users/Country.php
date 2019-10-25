<?php

namespace GiveBlood\Modules\Users;

use Illuminate\Database\Eloquent\Model;
use GiveBlood\Traits\UuidTrait;

class Country extends Model
{
    use UuidTrait;

    protected $table = 'countries';

    protected $filliable = [ 'country_name', 'country_code' ];
}
