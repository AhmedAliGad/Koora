<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class VideoCall extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'call_status_id', 'waiting_time', 'duration_time', 'rating',
        'channel_name', 'actual_time'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function callStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CallStatus::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['duration_from'] ?? false,
            fn ($query, $value) => $query->where('duration_time', '>=', $value)
        )->when(
            $filters['duration_to'] ?? false,
            fn ($query, $value) => $query->where('duration_time', '<=', $value)
        )->when(
            $filters['user_id'] ?? false,
            fn ($query, $value) => $query->where('user_id', $value)
        )->when(
            $filters['admin_id'] ?? false,
            fn ($query, $value) => $query->where('admin_id', $value)
        )->when(
            $filters['rating'] ?? false,
            fn ($query, $value) => $query->where('rating', $value)
        )->when(
            $filters['date_from'] ?? false,
            fn ($query, $value) => $query->whereDate('created_at', '>=', $value)
        )->when(
            $filters['date_to'] ?? false,
            fn ($query, $value) => $query->whereDate('created_at', '<=', $value)
        );
    }

    public function summery()
    {
        return nl2br("Call ID: ".$this->id."\r\n"."Agent: ".$this->admin->name."\r\n".
            "Pharmacy: ".$this->user->name."\r\n"."Call Duration: ".gmdate("H:i:s", $this->actual_time)."\r\n".
            "Waiting Time: ".gmdate("H:i:s", $this->waiting_time)."\r\n"."Rate: ".$this->rating."\r\n".
            "Date/Time: ".$this->created_at->format('d-m-Y g:i A'));
    }
}
