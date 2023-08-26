<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sorteio;
use App\Models\Saque;

class IndicadoController extends Controller
{
    //

    public function listar(){
        $sorteios = Sorteio::all();
        return view('user.indicado', ['sorteios' => $sorteios]);
    }

    public function vendedores(){
        $sorteios = Sorteio::all();
        $saques = Saque::where([
            ['status', 0]
        ])->get();
        $vendedores = User::where([
            ['isvendedor', 1]
        ])->get();
        return view('user.vendedores', ['sorteios' => $sorteios, 'vendedores' => $vendedores, 'saques' => $saques]);
    }
}
