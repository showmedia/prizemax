<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Venda;
use App\Models\Cota;
use App\Models\Sorteio;
use App\Models\User;
use Junges\Pix\Pix;
use MercadoPago\SDK;
USE MercadoPago;
use App\Mail\CompraCota;
use App\Mail\VendaFeita;

class VendaController extends Controller
{
    public function preparar(Request $request){
        $sorteio = Sorteio::findOrFail($request->id);
        $venda = new Venda;
        $venda->sorteio = $sorteio;
        $qtn = intval($request->qtn);
        $venda->valueAll = $sorteio->valorCota * $qtn;
        $venda->quantidade = $qtn;
        
        for($i=0;$i<$qtn;$i){
            $numCota = rand($sorteio->inicial, $sorteio->final);
         
             $conf = 0;
            if($sorteio->vendas){
                foreach($sorteio->vendas as $v){
                    if($v->cotas){
                        foreach($v->cotas as $c){
                            if($numCota == $c->number){
                                $conf++;
                            }
                        }
                    }
                }
            }
            if($venda->cotas){
                foreach($venda->cotas as $co){
                    if($numCota == $co->number){
                        $conf++;
                    }
                }
            }
            if($conf == 0){ 
                $i++;
                $cota = new Cota;
                $cota->number = $numCota;
                $cota->value = $sorteio->valorCota;
                $venda->cotas[] = $cota;
             } 
        }
        $request->session()->forget('venda');
        $request->session()->put('venda', $venda);
        

        return view('venda.comprar', ['venda' => $venda]);
    }

    public function confirmar(Request $request){
        $venda = $request->session()->get('venda');
        $user = auth()->user();

        $user->phone = $request->phone;
        $user->update();

        /*Atualizar sorteio*/ 
        $sorteio = Sorteio::findOrFail($venda->sorteio->id);
        $sorteio->qtnVenda = $sorteio->qtnVenda + count($venda->cotas);
        $sorteio->update();

        /** salvar venda */
        $v = new Venda;
        $v->valueAll = $venda->valueAll;
        $v->quantidade = $venda->quantidade;
        $v->sorteios_id = $sorteio->id;
        $v->users_id = $user->id;
        $v->save();

        /** Salvar cotas */
        foreach($venda->cotas as $cota){
            $c = new Cota;
            $c->number = $cota->number;
            $c->value = $cota->value;
            $c->vendas_id = $v->id;
            $c->save();
        }

        $request->session()->forget('venda');

        /** Envio de e-email*/

        Mail::to($v->user->email)->send(new CompraCota($v));
        Mail::to('gfpremios.gma@gmail.com')->send(new VendaFeita($v));

       

        return redirect('venda/show/'.$v->id)->with('msg','Realizar o pagamento via pix para concluir sua compra');



        
    }

    public function pagou($id){
        $venda = Venda::findOrFail($id);
        $venda->status = 1;
        $venda->update();
        return redirect("/vendas/paginate")->with('msg', 'Status do pagamento alterado com sucesso!');
    }

    public function showVenda($id){
        $venda = Venda::findOrFail($id);
        /**integração pix */
        // Se você já informou o seu client_id e client_secret no .env, não é necessário informar nesta requisição.
        SDK::setAccessToken("APP_USR-6676594080831518-091522-03e3710137636e1ab4f5417ec0ecb573-195549231");
        $payment = 0;
      /*   if($venda->pagamento == null){
  */
            $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $venda->valueAll;
        $payment->description = $venda->sorteio->name;
        $payment->payment_method_id = "pix";
        $payment->payer = array(
            "email" => $venda->user->email,
            "first_name" => $venda->user->name,
            "last_name" => $venda->user->name,
            "identification" => array(
                "type" => "CPF",
                "number" => "40306121808"
             ),
            "address"=>  array(
                "zip_code" => "06233200",
                "street_name" => "Av. das Nações Unidas",
                "street_number" => "3003",
                "neighborhood" => "Bonfim",
                "city" => "Osasco",
                "federal_unit" => "SP"
             )
          );
       
           $payment->save();
      
           $venda->pagamento = $payment->id;
           $venda->update();

       /*  }else if($venda->status == 0){
            $payment = MercadoPago\Payment::find_by_id(intval($venda->pagamento));
            $payment->transaction_amount = $venda->valueAll;
            $payment->capture = true;
            $payment->update();
            if($payment->status == 'approved' && $venda->status == 0){
                $venda->status = 1;
                $venda->update();
            }else {
                $payment = MercadoPago\Payment::find_by_id(intval($venda->pagamento));
            }
        }     */ 

        return view('finalizar',['venda' => $venda, 'pag' => $payment]);
    }

    public function teste(Request $request){

        $venda = Venda::findOrFail($request->idVenda);
        /**integração pix */
        // Se você já informou o seu client_id e client_secret no .env, não é necessário informar nesta requisição.
        SDK::setAccessToken("APP_USR-6676594080831518-091522-03e3710137636e1ab4f5417ec0ecb573-195549231");

        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $venda->valueAll;
        $payment->description = $venda->sorteio->name;
        $payment->payment_method_id = "pix";
        $payment->payer = array(
            "email" => $venda->user->email,
            "first_name" => $venda->user->name,
            "last_name" => $venda->user->name,
            "identification" => array(
                "type" => "CPF",
                "number" => "40306121808"
             ),
            "address"=>  array(
                "zip_code" => "06233200",
                "street_name" => "Av. das Nações Unidas",
                "street_number" => "3003",
                "neighborhood" => "Bonfim",
                "city" => "Osasco",
                "federal_unit" => "SP"
             )
          );
       
           $payment->save();

        
        

           return view('finalizar',['venda' => $venda , 'pag' => $payment]);
    }

    public function listVendas($all){
        $vendas;
         /**integração pix */
        // Se você já informou o seu client_id e client_secret no .env, não é necessário informar nesta requisição.
        SDK::setAccessToken("APP_USR-6676594080831518-091522-03e3710137636e1ab4f5417ec0ecb573-195549231");

        if ($all == 'all'){
            $vendas = Venda::orderby('id', 'desc')->get();
        }else{
            $vendas = Venda::orderby('id', 'desc')->paginate(10);
        }

        foreach($vendas as $v){
            if($v->pagamento != null){
                $payment = MercadoPago\Payment::find_by_id(intval($v->pagamento));
             if($payment->status != 'pending'){
                $v->status = 1;
                $v->update();
            }
            }
        }
        
        return view('venda.list', ['vendas' => $vendas]);
    }

}
