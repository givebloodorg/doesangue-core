<?php

namespace GiveBlood\Modules\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use GiveBlood\Traits\UuidTrait;
use GiveBlood\Modules\Users\User;

class Invite extends Model
{
    use SoftDeletes, UuidTrait;

    protected $table = 'invites';

    protected $filliable = [ 'invite_code', 'user_id' ];

    protected $hidden = [ 'user_id', 'created_at', 'updated_at' ];

    protected $dates = [ 'created_at', 'updated_at' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
