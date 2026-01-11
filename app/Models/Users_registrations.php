<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_registrations extends Model
{
	protected $table = 'users_registations'; // 👈 EXACT table name
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
}
