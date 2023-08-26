<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saque extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsto('App\Models\User', 'users_id');
    }
    public function conta(){
        return $this->belongsto('App\Models\Conta', 'contas_id');
    }
}
