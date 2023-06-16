<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffResource extends Model
{
    use HasFactory;
    protected $table ='staff';
    public $timestamps = false;
    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'name',
        'nama_staff',
        'username',
        'email',
        'password',
        'no_telepon',
    ];


}
