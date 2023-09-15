<?php

namespace GiveBlood\Modules\Campaign;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use GiveBlood\Modules\Users\User;
use GiveBlood\Traits\UuidTrait;

class Comment extends Model
{

    use HasFactory;
    use SoftDeletes;
    use UuidTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $filliable = [ 'comment',  'campaign_id', 'user_id' ];

    /**
     * @var string[]
     */
    protected $hidden = [ 'created_at', 'updated_at', 'deleted_at' ];

    /**
     * @var string[]
     */
    protected $dates = [
      'created_at', 'updated_at', 'deleted_at'
    ];

}
