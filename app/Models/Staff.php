<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class Staff extends Model
{
   // use HasFactory;
   use HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $table = "staff";
   protected $guard = "staff";
   protected $primaryKey = "id";
   protected $fillable = [
       'name',
       'username',
       'password', 
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
       'password',
       'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
       'email_verified_at' => 'datetime',
   ];
}
