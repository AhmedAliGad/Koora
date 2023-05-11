<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'city_id', 'active'];

    /**
     * @param Builder $builder
     */
    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true);
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
