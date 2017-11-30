<?php

namespace DoeSangue;

use Webpatser\Uuid\Uuid;

/**
 * summary
 */
trait Uuids
{
    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
          $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }
}
