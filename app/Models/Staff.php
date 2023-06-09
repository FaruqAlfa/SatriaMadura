<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use App\Models\Barang_Keluar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Model;

class Staff extends Model
{
    use HasFactory;

    protected $table="staff"; 
    public $timestamps= false;
    protected $primaryKey = 'id';

    protected $fillable = [
        // 'id',
        // 'nama_staff',
        // 'no_telepon',
        'name',
        'username',
        'password', 
    ];

    public function barang_keluar(){
        return $this->hasMany(Barang_Keluar::class);
    }
}
