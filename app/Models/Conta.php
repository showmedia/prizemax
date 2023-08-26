<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsto('App\Models\User', 'users_id');
    }

    public function saques(){
        return $this->hasMany('App\Models\Saque', 'contas_id');
    }
}
