<?php

namespace Trubar\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrubarPost extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trubar_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'author_id',
        'post_type_id',
        'parent_id',
        'title',
        'body',
        'excerpt',
        'permalink',
        'published_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function children()
    {
        return $this->hasMany(self::class);
    }

    public function comments()
    {
        return $this->hasMany(TrubarComment::class);
    }

    public function parent()
    {
        return $this->hasOne(self::class);
    }

    public function type()
    {
        return $this->hasOne(TrubarPostType::class);
    }
}

