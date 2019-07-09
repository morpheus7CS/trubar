<?php

namespace Wewowweb\Trubar\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wewowweb\Trubar\Models\TrubarPostMeta;
use Wewowweb\Trubar\Models\TrubarPostType;
use Wewowweb\Trubar\Models\TrubarUser;

class TrubarPost extends Model
{
    use SoftDeletes, HasSlug;

    public $incrementing = false;

    protected $casts = ['published_at'];

    protected $fillable = [
        'author_id',
        'post_type',
        'post_status',
        'parent_id',
        'title',
        'excerpt',
        'body',
        'published_at'
    ];

    /**
     *  Setup model event hooks.
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string)Uuid::uuid4();
        });
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function author()
    {
        return $this->hasOne(TrubarUser::class);
    }

    public function parent()
    {
        return $this->hasOne(self::class);
    }

    public function meta()
    {
        return $this->hasOne(TrubarPostMeta::class);
    }

    public function type()
    {
        return $this->hasOne(TrubarPostType::class);
    }
}
