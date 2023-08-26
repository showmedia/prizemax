<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Premio;
use App\Models\Venda;

class Sorteio extends Model
{
    use HasFactory;

    public function premios() {
        return $this->hasMany('App\Models\Premio', 'sorteios_id');
    }

    public function vendas() {
        return $this->hasMany('App\Models\Venda', 'sorteios_id');
    }
}
