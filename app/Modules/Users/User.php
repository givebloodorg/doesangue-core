<?php

namespace GiveBlood\Modules\Users;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use GiveBlood\Modules\Campaign\Campaign;
use GiveBlood\Modules\Users\Invite;
use GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Traits\UuidTrait;

class User extends Authenticatable implements JWTSubject

{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use UuidTrait;
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
        'country_id',
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
          'uid',
          'remember_token',
          'created_at',
          'updated_at',
          'deleted_at',
          'phone',
          'active',
          'username',
          'is_active',
          'birthdate',
          'email',
          'blood_type_id'
        ];

      /**
       * Indicates if the IDs are auto-incrementing.
       *
       * @var bool
       */
    public $incrementing = false;

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

    /**
     * @var string[]
     */
    protected $appends =
      [
        'is_active'
      ];

       /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Returns the full name of user.
     */
    public function getFullNameAttribute($value): string
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    /**
     * Get user avatar or set default.png as default.
     */
    public function getAvatarAttribute($avatar): string
    {
        return asset($avatar ?: 'images/avatars/default.png');
    }

    /**
     * Returns the campaigns created by the user.
     *
     * @return HasMany relationship
     * @var    array
     */
    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * Related.
     */
    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }

    /**
     * Return as Many invites created by user.
     */
    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class);
    }

    /**
     * Returns the comments created by the user.
     *
     * @return HasMany relationship
     * @var    array
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->attributes[ 'status' ] == "active";
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'username';
    }

    public function getPhoneNumberAttribute(): string
    {
        return $this->attributes[ 'phone' ];
    }

}
