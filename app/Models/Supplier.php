<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Model;
use App\Models\Barang_Masuk;

class Supplier extends Model
{
    use HasFactory;

    protected $table="supplier"; 
    public $timestamps= false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'username',
        'name',
        'email',
        'password',
        'nama_supplier',
        'no_telepon',
    ];

    public function barang_masuk(){
        return $this->hasMany(Barang_Masuk::class);
    }
}
