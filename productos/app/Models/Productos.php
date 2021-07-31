<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //asi evitamos ataques y que no de error de fillable, es decir q estos campos son validos y aceptados por el aplicativo
    protected $fillable = [
        'nombre',
        'categorias_id',
        'paraQuien',
        'descripcion',
        'imagen',
    ];

    //OBTENER LA CATEGORIA MEDIANTE LA CLAVE FORANEA
    public function categoriaProducto()
    {
        //relacion de 1 : 1
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }

    //OBTENER EL AUTOR MEDIANTE LA CLAVE FORANEA
    public function autorProducto()
    {
        //relacion de 1 : 1
        return $this->belongsTo(User::class, 'user_id');

    }
}
