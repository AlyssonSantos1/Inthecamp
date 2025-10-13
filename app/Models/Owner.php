<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory; 

    protected $table = 'owners';

    protected $primaryKey = 'id';

    private $fillable = ['name', 'email', 'password', 'function'];

     protected $hidden = [
        'password',
        'remember_token',
    ];
}
