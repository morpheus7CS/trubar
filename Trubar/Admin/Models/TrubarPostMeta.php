<?php

namespace Trubar\Admin\Models;

use Trubar\Admin\Models\TrubarPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrubarPostMeta extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trubar_post_meta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'post_id',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(TrubarPost::class);
    }
}
