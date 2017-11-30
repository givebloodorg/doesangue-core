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
}
