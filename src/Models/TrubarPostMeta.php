<?php

namespace Wewowweb\Trubar\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wewowweb\Trubar\Models\TrubarPost;

class TrubarPostMeta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'meta',
        'post_id'
    ];

    public function post(){
        return $this->belongsTo(TrubarPost::class);
    }
}
