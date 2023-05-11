<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'phone', 'email', 'links',
        'terms_en', 'terms_ar', 'privacy_en', 'privacy_ar', 'video_url'];

    protected $casts = ['links' => 'array'];
}
