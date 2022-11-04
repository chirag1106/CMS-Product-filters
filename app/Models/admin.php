<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillables = [
        'name',
        'email',
        'password',
        'admin_id',
        'verification_code',
        'email_verified_at',
        'last_login',
        'last_logout',
        'status',
        'email_status'
    ];

    protected $guarded = [];

    protected $table = 'admins';

    use HasFactory;
}
