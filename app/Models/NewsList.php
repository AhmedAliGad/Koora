<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsList extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image', 'team_id', 'active'];

    public function getMainImageAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

}
