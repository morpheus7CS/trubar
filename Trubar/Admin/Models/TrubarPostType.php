<?php

namespace Trubar\Admin\Models;

use Trubar\Admin\Models\TrubarPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrubarPostType extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trubar_post_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(TrubarPost::class);
    }
}
