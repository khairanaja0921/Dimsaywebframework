<?php

namespace App\Models;

// ...
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; 

class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes; 

   
}