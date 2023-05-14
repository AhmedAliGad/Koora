<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = ['photo_gallery_id', 'image_path'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($photo) {
            if ($photo->image_path) {
                Storage::disk('public')->delete($photo->image_path);
            }
        });
    }
    public function getImageAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    public function photoGallery(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PhotoGallery::class, 'photo_gallery_id');
    }
}
