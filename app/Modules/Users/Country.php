<?php

namespace GiveBlood\Modules\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use GiveBlood\Traits\UuidTrait;
use GiveBlood\Modules\User\Database\Factories\CountryFactory;

class Country extends Model
{
    use HasFactory;
    //use UuidTrait;

    /**
     * @var string
     */
    protected $table = 'countries';

    protected array $filliable = [ 'country_name', 'country_code' ];
}
