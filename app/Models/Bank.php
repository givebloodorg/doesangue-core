<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $filliable = [
      'name',
      'email',
      'url',
      'phone',
      'location'
    ];

    protected $hidden = [
      'id',
      'email',
      'created_at',
      'updated_at',
      'delete_at'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
      'delete_at'
    ];
}
