<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Numero;

class Nota extends Model
{
    use HasFactory;
    

    public function numeros() {
        return $this->hasMany('App\Models\Numero', 'notas_id');
    }
}
