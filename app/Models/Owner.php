<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Owner extends Authenticatable
{
    use HasFactory, Notifiable; 

    protected $table = 'owners';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'password', 'function'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
