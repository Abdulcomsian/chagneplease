<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Analyst extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'analyst';
    protected $primaryKey = 'id';
    protected $fillable = ['email' , 'firstname' , 'lastname' , 'password'];

}
