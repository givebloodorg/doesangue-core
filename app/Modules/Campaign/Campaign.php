<?php

namespace GiveBlood\Modules\Campaign;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use GiveBlood\Modules\Users\User;
use GiveBlood\Traits\UuidTrait;

class Campaign extends Model
{

    use HasFactory;
    use SoftDeletes;
    use UuidTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaigns';

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
    protected $filliable = [ 'title', 'description', 'image', 'due_date', 'user_id' ];

    /**
     * @var string[]
     */
    protected $hidden = [ 'created_at', 'updated_at', 'deleted_at', 'user_id' ];

    /**
     * @var string[]
     */
    protected $dates = [
      'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Return the owner of campaign
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
