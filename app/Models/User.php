<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'phone', 'password', 'address', 'code', 'city_id', 'area_id', 'status',
        'active', 'role', 'device_token', 'device_os'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeSearch($query, $filter)
    {
        if (filter_var($filter, FILTER_VALIDATE_EMAIL)) {
            return $query->where('email', $filter);
        }
        /*if (preg_match('/^[0-9]+$/', $filter)) {
            return $query->where('phone', $filter);
        }*/
        return $query->where('name', 'like', '%' .$filter.  '%')->orwhere('email', 'like', '%' .$filter.  '%')
                     ->orwhere('phone', 'like', '%' .$filter.  '%');
    }

    public function videoCalls(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VideoCall::class, 'user_id');
    }

    public function agentCalls(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VideoCall::class, 'admin_id');
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function area(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function oldCity()
    {
        return $this->city ? $this->city()->get(['id', 'name_en'])->map(function ($city) {
            return [
                'id' => $city->id,
                'name' => $city->name_en
            ];
        }) : null;
    }

    public function oldArea()
    {
        return $this->area ? $this->area()->get(['id', 'name_en'])->map(function ($area) {
            return [
                'id' => $area->id,
                'name' => $area->name_en
            ];
        }) : null;
    }

    /**
     * Create a new personal access token for the user.
     *
     * @param string $name
     * @param array $abilities
     * @return NewAccessToken
     */
    public function createToken(string $name, array $abilities = ['*'])
    {
        $token = $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = Str::random(100)),
            'abilities' => $abilities,
        ]);

        return new NewAccessToken($token, $plainTextToken);
    }

    /**
     * @param Builder $builder
     */
    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true);
    }

    /**
     * @param Builder $builder
     */
    public function scopePharmacies(Builder $builder)
    {
        $builder->where('role', 'client');
    }

    /**
     * @param Builder $builder
     */
    public function scopeAgents(Builder $builder)
    {
        $builder->where('role', 'agent');
    }

    public function userlogs()
    {
        return $this->hasMany(UserLog::class, 'user_id');
    }

    public function adminlogs()
    {
        return $this->hasMany(AdminLog::class, 'admin_id');
    }

    public function getUserLoginTime()
    {
        if (count($this->userlogs)) {
            return last($this->userlogs()->latest()->first()->login_times);
        } else {
            return ' - - ';
        }
    }

    public function getUserCalls()
    {
        return $this->videoCalls()->whereDate('created_at', Carbon::today())
                    ->where('user_id', $this->id)->count();
    }

    public function getLoginTime()
    {
        if (count($this->adminlogs)) {
            return last($this->adminlogs()->latest()->first()->login_times);
        } else {
            return ' - - ';
        }
    }

    public function getHandledCalls()
    {
        return $this->agentCalls()->whereDate('created_at', Carbon::today())
                    ->where('admin_id', $this->id)->count();
    }
}
