<?php

namespace GiveBlood\Modules\Users;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use GiveBlood\Traits\UuidTrait;
use GiveBlood\Modules\Users\User;

class Invite extends Model
{
    use SoftDeletes;
    use UuidTrait;
    /**
     * @var string
     */
    protected $table = 'invites';

    protected array $filliable = [ 'invite_code', 'user_id' ];

    /**
     * @var string[]
     */
    protected $hidden = [ 'user_id', 'created_at', 'updated_at' ];

    /**
     * @var string[]
     */
    protected $dates = [ 'created_at', 'updated_at' ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
