<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teststudents extends Model
{
    use HasFactory;

    protected $table = 'teststudents';

    // Fillable columns (mass assignment)
    protected $fillable = ['name', 'email'];



public static function saveStudent()
    {
        $user = new teststudents();
$user->name = "Jiljo";
$user->email = "j4jiljokg@gmail.com";
$user->save();

return $user;
    }


}