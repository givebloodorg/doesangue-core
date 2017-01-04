<?php

namespace DoeSangue\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaigns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $filliable = [ 'title', 'expires', 'id_user' ];

    protected $hidden = [ 'created_at', 'updated_at' ];

    public function author()
    {
        return $this->hasOne(DoeSangue\Models\User::class, 'id', 'id_user');
    }
}
