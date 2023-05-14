<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialType extends Model
{
    protected $fillable = ['name', 'icon', 'active'];
}
