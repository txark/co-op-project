<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'company_name', 
        'company_email', 
        'company_password',
    ];
    protected $hidden = [
        'company_password',
        'remember_token',
    ];
    public $timestamps = false;
}
