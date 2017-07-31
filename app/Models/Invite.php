<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'invites';

    protected $filliable = [ 'invite_code', 'user_id' ];

    protected $hidden = [ 'user_id', 'created_at', 'updated_at' ];

    protected $dates = [ 'created_at', 'updated_at' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
