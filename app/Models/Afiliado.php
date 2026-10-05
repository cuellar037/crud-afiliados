<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory; 

    protected $fillable = [
        'nombre', 
        'apellido', 
        'tipo_documento', 
        'numero_documento', 
        'numero_celular', 
        'email', 
    ];
}
