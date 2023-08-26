<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Venda;

class Cota extends Model
{
    use HasFactory;

    public function venda() {
        return $this->belongsTo('App\Models\Venda', 'vendas_id');
    }
}
