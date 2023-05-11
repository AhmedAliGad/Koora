<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['name', 'phone', 'email', 'password', 'active', 'role', 'status'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getStatusAttribute($value)
    {
        return match ($value) {
            'active' => 'Active',
            'in_call' => 'In Call',
            'sing_out' => 'Sing Out',
            default => ''
        };
    }

    public function videoCalls(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VideoCall::class, 'admin_id');
    }

    public function logs()
    {
        return $this->hasMany(AdminLog::class, 'admin_id');
    }

    public function getLoginTime()
    {
        if (count($this->logs)) {
            return last($this->logs()->latest()->first()->login_times);
        } else {
            return ' - - ';
        }
    }

    public function getHandledCalls()
    {
        return $this->videoCalls()->whereDate('created_at', Carbon::today())
                                  ->where('admin_id', $this->id)->count();
    }
}
