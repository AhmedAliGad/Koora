<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $fillable = ['admin_id', 'total_calls', 'total_duration', 'login_times', 'logout_times'];

    protected $casts = ['login_times' => 'array', 'logout_times' => 'array'];

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
