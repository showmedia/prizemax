<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sorteio;

class Premio extends Model
{
    use HasFactory;

    public function sorteio() {
        return $this->belongsTo('App\Models\Sorteio', 'sorteios_id');
    }

   
}
