<?php

namespace DoeSangue\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use DoeSangue\Models\Campaign;
use DoeSangue\Models\Invite;
use DoeSangue\Models\BloodType;
use DoeSangue\Models\Comment;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
      [
        'first_name',
        'last_name',
        'email',
        'username',
        'phone',
        'country_code',
        'bio',
        'birthdate',
        'active',
        'password',
        'blood_type_id',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden =
        [
          'password',
          'remember_token',
          'created_at',
          'updated_at',
          'deleted_at',
          'id',
          'phone',
          'active',
          'username',
          'is_active',
          'birthdate',
          'email',
          'blood_type_id'
        ];

    /**
     * The dates attributes.
     *
     * @var array $dates
     */
    protected $dates =
      [
        'created_at',
        'updated_at',
        'deleted_at'
      ];

    protected $appends =
      [
        'is_active'
      ];

    /**
     * Returns the full name of user.
     *
     * @return string
     */
    public function getFullNameAttribute($value)
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    /**
     * Get user avatar or set default.png as default.
     *
     * @return void
     */
    public function getAvatarAttribute($avatar)
    {
        return asset($avatar ?: 'images/avatars/default.png');
    }

    /**
     * Returns the campaigns created by the user.
     *
     * @return array relationship
     * @var    array
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * Related.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }

    /**
     * Return as Many invites created by user.
     */
    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    /**
     * Returns the comments created by the user.
     *
     * @return array relationship
     * @var    array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getIsActiveAttribute()
    {
        return $this->attributes[ 'status' ] == "active";
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Get the user phone number
     * @return string
     */
    public function getPhoneNumberAttribute()
    {
        return $this->attributes[ 'country_code' ].$this->attributes[ 'phone' ];
    }

}
