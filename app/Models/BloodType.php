<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;
use DoeSangue\Models\User;

class BloodType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blood_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $filliable =
      [
        'description',
        'code',
      ];

    /**
     * BloodType Dates.
     *
     * @var array
     */
    protected $dates =
      [
        'created_at',
        'updated_at'
      ];
    /**
     * Hidden fields from json response.
     *
     * @return void
     */
    protected $hidden =
      [
        'created_at',
        'updated_at'
      ];

    /**
     * Related.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
