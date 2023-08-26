<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Saque;

class SaqueController extends Controller
{
    public function solicitar(Request $request){
        $saque = new Saque;
        $saque->valor = $request->valorpix;
        $saque->tipochave = $request->tipo;
        $saque->chave = $request->chave;
        $saque->users_id = auth()->user()->id;
        $saque->contas_id = auth()->user()->conta->id;
        $saque->save();
        auth()->user()->conta->saldo -= $saque->valor;
        auth()->user()->conta->update();
        return redirect('/indicados')->with('msg', 'Saque solicitado!');
    }
    public function pagar($id){
        $saque = Saque::findOrFail($id);
        $saque->status = 1;
        $saque->user->conta->ganhopago += $saque->valor;
        $saque->user->conta->update();
        $saque->update();
        return redirect('/vendedores')->with('msg', 'Saque pago com sucesso!');
    }
}
