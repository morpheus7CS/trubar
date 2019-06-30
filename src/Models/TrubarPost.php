<?php

namespace Wewowweb\Trubar\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wewowweb\Trubar\Models\TrubarPostMeta;
use Wewowweb\Trubar\Models\TrubarPostType;
use App\Models\TrubarPostStatus;

class TrubarPost extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $casts = ['published_at'];

    /**
     *  Setup model event hooks.
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::uuid4();
        });
    }

    public function author(){
        // TBD
    }

    public function parent(){
        return $this->hasOne(self::class);
    }

    public function meta(){
        return $this->hasOne(TrubarPostMeta::class);
    }

    public function type(){
        return $this->hasOne(TrubarPostType::class);
    }

    public function status(){
        return $this->hasOne(TrubarPostStatus::class);
    }
}
