<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'idcliente';
    public $timestamps = false;
    protected $fillable = [
        'apellidos',
        'nombres',
        'dni',
        'telefono',
        'email',
        'estado'
    ];

    public function comandas() {
        return $this->hasOne(Comanda::class,'idcliente','idcliente');
    }
}
