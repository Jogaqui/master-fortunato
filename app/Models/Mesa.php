<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $table = 'mesas';
    protected $primaryKey = 'idMesa';
    public $timestamps = false;
    protected $fillable = [
        'ubicacion',
        'capacidad',
        'estado'
    ];

    public function comandas() {
        return $this->hasOne(Comanda::class,'idmesa','idmesa');
    }
}
