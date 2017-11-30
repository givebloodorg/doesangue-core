<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;
use Webpatser\Uuid\Uuid;

class Comment extends Model
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

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

     /**
     * Generate automaticaly the Comment id(uuid).
     *
     * @return Webpatser\Uuid\Uuid::generate()
     */
    public static function boot()
    {
        parent::boot();
        self::creating(
            function ($model) {
                // Generate a version 4 Uuid.
                $model->id = (string) Uuid::generate(4)->string;
            }
        );
    }
}
