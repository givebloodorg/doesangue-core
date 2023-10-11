<?php

namespace GiveBlood\Modules\Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GiveBlood\Traits\UuidTrait;

class Bank extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UuidTrait;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    protected array $filliable = [
      'name',
      'email',
      'url',
      'phone',
      'location'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
      'bid',
      'email',
      'created_at',
      'updated_at',
      'deleted_at'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];
}
