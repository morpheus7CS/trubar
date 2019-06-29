<?php

namespace Wewowweb\Trubar\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wewowweb\Trubar\Models\TrubarPost;

class TrubarPostType extends Model
{
    use SoftDeletes;

    protected $fillable = ['slug'];

    public function post()
    {
        return $this->belongsTo(TrubarPost::class);
    }
}
