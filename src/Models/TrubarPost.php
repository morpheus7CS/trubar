<?php

namespace Wewowweb\Trubar\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class TrubarPost extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $casts = ['published_at'];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
}
