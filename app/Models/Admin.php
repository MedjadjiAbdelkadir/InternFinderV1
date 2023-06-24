<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
    ];
}
