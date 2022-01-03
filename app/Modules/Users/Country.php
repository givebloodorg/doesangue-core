<?php

namespace GiveBlood\Modules\Users;

use Illuminate\Database\Eloquent\Model;
use GiveBlood\Traits\UuidTrait;

class Country extends Model
{
    use UuidTrait;

    /**
     * @var string
     */
    protected $table = 'countries';

    protected array $filliable = [ 'country_name', 'country_code' ];
}
