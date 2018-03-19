<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DoeSangue\Uuids;

class Bank extends Model
{

  use SoftDeletes, Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    protected $filliable = [
      'name',
      'email',
      'url',
      'phone',
      'location'
    ];

    protected $hidden = [
      'bid',
      'email',
      'created_at',
      'updated_at',
      'deleted_at'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];
}
