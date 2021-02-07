<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    
    protected $table = 'contacto';
    
    protected $fillable = ['idusuario1', 'idusuario2', 'idproducto', 'textoContacto'];
    
    public function producto () {        
        return $this->belongsTo ('App\Models\Producto', 'idproducto');
    }
    
    public function usuario () {        
        return $this->belongsTo ('App\Models\User', 'id');
    }
}
