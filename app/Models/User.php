<?php

namespace DoeSangue\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DoeSangue\Models\Campaign;
use DoeSangue\Models\Donor;
use DoeSangue\Models\Comment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'first_name',
                            'last_name',
                            'email',
                            'username',
                            'phone',
                            'bio',
                            'birthdate',
                            'active',
                            'password',
                          ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
                          'password',
                          'remember_token',
                          'created_at',
                          'updated_at',
                          'deleted_at',
                          'id',
                          'phone'
                        ];

    protected $dates = [
      'created_at', 'updated_at', 'deleted_at'
    ];

    public function getFullNameAttribute($value)
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function donor()
    {
        return $this->hasOne(Donor::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
