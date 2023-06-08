<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Barang_Masuk;
use Illuminate\Foundation\Auth\User as Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table="supplier"; 
    public $timestamps= false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    public function barang_masuk(){
        return $this->hasMany(Barang_Masuk::class);
    }
}
