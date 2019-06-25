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
        $this->hasMany(TrubarPost::class);
    }

    public function comments()
    {
        $this->hasMany(TrubarComment::class);
    }

    public function parent()
    {
        $this->hasOne(TrubarPost::class);
        
    }

    public function type(){
        $this->hasOne(TrubarPostType::class);
    }
}
