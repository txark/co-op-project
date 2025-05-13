<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'company_id';
    public $incrementing = false; // สำคัญมาก! ถ้าใช้ string เป็น id
    protected $keyType = 'string';

    protected $fillable = [
        'company_id',
        'company_name',
        'company_email',
        'company_password',
    ];
}
