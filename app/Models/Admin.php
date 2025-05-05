<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin';
    protected $fillable = [
        'admin_username',
        'admin_password',
    ];
    protected $hidden = [
        'admin_password',
        'remember_token',
    ];
}
