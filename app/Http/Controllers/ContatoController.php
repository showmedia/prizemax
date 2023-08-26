<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Sorteio;
use App\Models\Contato;
use App\Mail\EnvioContato;

class ContatoController extends Controller
{
    public function show(){
        $sorteios = Sorteio::orderBy('id','DESC')->get();
        return view('contato', ['sorteios' => $sorteios]);
    }

    public function send(Request $request){
        $contato = new Contato;
        $contato->name = $request->name;
        $contato->email = $request->email;
        $contato->phone = $request->phone;
        $contato->sorteio = $request->sorteio;
        $contato->mensagem = $request->mensagem;

        $contato->save();

           /** Envio de e-email*/

           Mail::to('gfpremios.gma@gmail.com')->send(new EnvioContato($contato));

       

        return redirect('/')->with('msg','Contato enviado com sucesso, aguardo nosso retorno, ou se preferir, entre no grupo do whatsapp');
    }
}
