<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DoeSangue\Models\User;
use DoeSangue\Models\Comment;
use Webpatser\Uuid\Uuid;

class Campaign extends Model
{

    use SoftDeletes;

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
    protected $filliable = [ 'title', 'description', 'image', 'expires', 'user_id' ];

    protected $hidden = [ 'created_at', 'updated_at', 'deleted_at', 'user_id' ];

    protected $dates = [
      'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Return the owner of campaign
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Generate automaticaly the Campaign id(uuid).
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        self::creating(
            function($model) {
                // Generate a version 4 Uuid.
                $model->id = (string) Uuid::generate(4)->string;
            }
        );
    }
}
