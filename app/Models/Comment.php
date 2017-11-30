<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;
use DoeSangue\Uuids;

class Comment extends Model
{

    use SoftDeletes, Uuids;

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
    protected $filliable = [
      'comment_id',
      'id',
      'comment',
      'campaign_id',
      'user_id'
    ];

    protected $primaryKey = 'comment_id';

    protected $dates = [
      'created_at',
      'updated_at'
    ];

    protected $hidden = [
      'created_at',
      'updated_at',
      'user_id',
      'campaign_id'
    ];

    // protected $casts = [ 'commentator', 'campaign' ];

    public function commentator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
