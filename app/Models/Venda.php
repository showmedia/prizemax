<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sorteio;
use App\Models\User;
use App\Models\Cota;

class Venda extends Model
{
    use HasFactory;

    public function sorteio() {
        return $this->belongsTo('App\Models\Sorteio', 'sorteios_id');
    }
    public function user() {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
    public function cotas() {
        return $this->hasMany('App\Models\Cota', 'vendas_id');
    }
}
