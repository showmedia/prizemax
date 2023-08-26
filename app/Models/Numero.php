<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nota;

class Numero extends Model
{
    use HasFactory;
    

    public function nota() {
        return $this->belongsTo('App\Models\Nota', 'notas_id');
    }
}
