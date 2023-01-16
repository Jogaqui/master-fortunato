<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    use HasFactory;
    protected $table = 'comidas';
    protected $primaryKey = 'idcomida';
    public $timestamps = false;
    protected $fillable = [
        'nombreComida',
        'precio',
        'idcategoria',
        'estado'
    ];
    public function categoria() {
        return $this->hasOne(Categoria::class,'idcategoria','idcategoria');
    }

    public function detalle() {
        return $this->hasOne(Detalle::class,'idcomida','idcomida');
    }
}
