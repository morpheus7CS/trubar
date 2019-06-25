<?php

namespace Trubar\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class TrubarPost extends Model
{
    protected $table = 'trubar_posts';

    protected $fillable = [];

    public function author()
    {
        $this->belongsTo(User::class, 'author_id');
    }

    public function children()
    {
        $this->hasMany(self::class);
    }

    public function comments()
    {
        $this->hasMany(TrubarComment::class);
    }

    public function parent()
    {
        $this->hasOne(self::class);
    }

    public function type()
    {
        $this->hasOne(TrubarPostType::class);
    }
}
