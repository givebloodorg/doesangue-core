<?php

namespace GiveBlood\Modules\Blood;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use GiveBlood\Modules\Users\User;
use GiveBlood\Traits\UuidTrait;

class BloodType extends Model
{

    use SoftDeletes, UuidTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blood_types';

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
        'bid',
        'created_at',
        'updated_at'
      ];

    /**
     * Related.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
