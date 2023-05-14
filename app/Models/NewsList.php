<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewsList extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image', 'team_id', 'active'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($newsList) {
            if ($newsList->image) {
                Storage::disk('public')->delete($newsList->image);
            }
        });
    }
    public function getMainImageAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

}
