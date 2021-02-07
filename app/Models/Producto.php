<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'producto';
    
    protected $fillable = ['idusuario', 'idcategoria', 'nombre', 'descripcion',
                           'uso', 'precio', 'fecha', 'estado', 'foto'];
                           
    public function categorias() {
        return $this->belongsTo('App\Models\Categoria', 'idcategoria');
    }
    
    public function usuario () {        
        return $this->belongsTo ('App\Models\User', 'idusuario');
    }
}