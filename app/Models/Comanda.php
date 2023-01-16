<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;
    protected $table = 'comandas';
    protected $primaryKey = 'idcomanda';
    public $timestamps = false;
    protected $fillable = [
        'idcliente',
        'idmesa',
        'id',
        'fecha',
        'estado'
    ];
    public function cliente() {
        return $this->hasOne(Cliente::class,'idcliente','idcliente');
    }

    public function mesa() {
        return $this->hasOne(Mesa::class,'idmesa','idmesa');
    }

    public function user() {
        return $this->hasOne(User::class,'id','id');
    }

    public function detalle() {
        return $this->hasOne(Detalle::class,'idcomanda','idcomanda');
    }

}
