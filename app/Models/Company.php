<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableBase;
class Company extends AuthenticatableBase implements Authenticatable
{
    use HasFactory;
    protected $table = 'company';
    protected $primaryKey = 'company_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'company_id',
        'company_name', 
        'company_email', 
        'company_password',
    ];
    protected $hidden = [
        'company_password',
        'remember_token',
    ];
}
