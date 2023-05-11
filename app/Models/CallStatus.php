<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallStatus extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'active'];
}
