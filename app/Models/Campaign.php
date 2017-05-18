<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use DoeSangue\Models\User;

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
    protected $filliable = [ 'title', 'expires', 'user_id' ];

    protected $hidden = [ 'created_at', 'updated_at' ];

    public function owner()
    {
        return $this->hasOne(User::class);
    }
}
