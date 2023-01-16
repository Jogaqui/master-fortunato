<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $table = 'detalles_comanda';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'observacion',
        'idcomanda',
        'idcomida',
    ];
    public function comanda() {
        return $this->hasOne(Comanda::class,'idcomanda','idcomanda');
    }

    public function comida() {
        return $this->hasOne(Comida::class,'idcomida','idcomida');
    }


}
