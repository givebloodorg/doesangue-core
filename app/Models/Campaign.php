<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaigns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $filliable = [ 'title' ];

    protected $hidden = [ 'created_at', 'updated_at' ];
}
