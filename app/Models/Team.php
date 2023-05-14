<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'name_en', 'slug', 'logo', 'cover', 'year_founded', 'nickname', 'stadium', 'manager',
        'description', 'points', 'matches_no', 'social_links', 'active'];

    protected $casts = ['social_links' => 'array'];

    public function getImageAttribute()
    {
        return asset('storage/' . $this->logo);
    }

    public function newsList()
    {
        return $this->hasMany(NewsList::class, 'team_id');
    }
}
