<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deseos extends Model
{
    use HasFactory;
    
    protected $table = 'deseo';
    
    protected $fillable = ['idusuario', 'idproducto'];
    
    public function producto () {        
        return $this->belongsTo ('App\Models\Producto', 'idproducto');
    }
    
    public function usuario () {
        return $this->belongsTo ('App\Models\User', 'id');
    }
}
