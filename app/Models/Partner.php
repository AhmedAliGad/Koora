<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    protected $fillable = ['name', 'logo', 'active'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($slider) {
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
        });
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->logo);
    }
}
