<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PhotoGallery extends Model
{
    protected $fillable = ['title', 'slug', 'image_path', 'active', 'populate_date'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($photoGallery) {
            if ($photoGallery->image_path) {
                Storage::disk('public')->delete($photoGallery->image_path);
            }
        });
    }
    public function getImageAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
