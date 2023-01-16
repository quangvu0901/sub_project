<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;

    public $table = 'profile_users';

    protected $fillable = ['id', 'phone', 'address', 'birthday', 'gender'];
}
