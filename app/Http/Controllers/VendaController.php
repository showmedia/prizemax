<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

        $user = auth()->user();

        $venda = new Venda;

        $venda->sorteios_id = $sorteio->id;

        $qtn = intval($request->qtn);

     

        $venda->valueAll = $sorteio->valorCota * $qtn;

        

        

        $venda->quantidade = $qtn;

        if($qtn > $sorteio->qtnCotas - $sorteio->qtnVenda){
            return redirect('/')->with('msg', 'Desculpe, mas só tem disponível apenas ' . $sorteio->qtnCotas - $sorteio->qtnVenda . 'cotas.');
        }

$vendidos = array();

// Popula o array $vendidos com todas as cotas já vendidas
if ($sorteio->vendas) {
    foreach($sorteio->vendas as $v) {
        if($v->cotas) {
            foreach($v->cotas as $c) {
                $vendidos[] = $c->number;
            }
        }
    }
}

// Gera um array com todos os números de cota disponíveis
$disponiveis = array_diff(range($sorteio->inicial, $sorteio->final), $vendidos);

for ($i = 0; $i < $qtn; $i++) {

    // Seleciona aleatoriamente um elemento do array de cotas disponíveis
    $index = array_rand($disponiveis);
    $numCota = $disponiveis[$index];

    $cota = new Cota;
    $cota->number = $numCota;
    $cota->value = $sorteio->valorCota;
    $venda->cotas[] = $cota;

    // Remove o número da cota vendida do array de cotas disponíveis
    unset($disponiveis[$index]);

}

// Reorganiza os índices do array de cotas disponíveis
$disponiveis = array_values($disponiveis);

        $venda->users_id = $user->id;

        $venda->save();

         /** Salvar cotas */

         foreach($venda->cotas as $co){

            $c = new Cota;

            $c->number = $co->number;

            $c->value = $co->value;

            $c->vendas_id = $venda->id;

            $c->save();

        }



        $sorteio->qtnVenda = $sorteio->qtnVenda + count($venda->cotas);

        $sorteio->update();

        



        return view('venda.comprar', ['venda' => $venda]);

    }



    public function confirmar(Request $request){

        $venda = Venda::findOrFail($request->id);

        $user = auth()->user();

        $user->phone = $request->phone;

        $user->update();

        /** Envio de e-email*/



    /*     Mail::to($venda->user->email)->send(new CompraCota($venda));

        Mail::to('gfpremios.gma@gmail.com')->send(new VendaFeita($venda));


   */



        return redirect('venda/show/'.$venda->id)->with('msg','Realizar o pagamento via pix para concluir sua compra');

        

    }

    public function limparcompras($id){
        $user = User::findOrFail($id);
        if($user->nivel == 1){
            foreach($user->compras as $compra){
                if($compra->sorteio->status == 1){
                    foreach($compra->cotas as $cota){
                        $cota->delete();
                    }
                    $compra->delete();
                }
            }
        }
        return redirect("/meusnumeros")->with('msg', 'todas suas compras foram deletadas!');
    }

    public function pagou($id){

        $venda = Venda::findOrFail($id);

        $venda->status = 1;

        if($venda->user->indicador){
            $comissao = $venda->valueAll * $venda->user->indicador->comissao;
            $venda->user->indicador->conta->saldo += $comissao;
            $venda->user->indicador->conta->ganhototal += $comissao;
            $venda->user->indicador->conta->update();
        }

        $venda->update();

        return redirect("/vendas/paginate")->with('msg', 'Status do pagamento alterado com sucesso!');

    }



    public function showVenda($id){

            $venda = Venda::findOrFail($id);
            $payment = 0;
    
    
            if($venda->pagamento == null){
                /**integração pix */
    
            // Se você já informou o seu client_id e client_secret no .env, não é necessário informar nesta requisição.
    
            SDK::setAccessToken("APP_USR-873875661767327-082612-45930de50c1522e0d8b5916b5874e3a9-139907967");
    
            $payment = new MercadoPago\Payment();
    
            $payment->transaction_amount = $venda->valueAll;
    
            $payment->description = $venda->sorteio->name;
    
            $payment->payment_method_id = "pix";
    
            $payment->notification_url = 'https://prizemax.com.br/api/stores?source_news=webhooks';
    
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
    
    
    
                
            }else{
    
                SDK::setAccessToken("APP_USR-873875661767327-082612-45930de50c1522e0d8b5916b5874e3a9-139907967");
    
                $payment = MercadoPago\Payment::find_by_id($venda->pagamento);
                
    
            }
    
            return view('finalizar',['venda' => $venda, 'pag' => $payment]);
    
        
    }



    public function teste(Request $request){



        return 'teste';

    }



    public function listVendas($all){

        $vendas;

        

        if ($all == 'all'){

            $vendas = Venda::orderby('id', 'desc')->get();

        }else{

            $vendas = Venda::orderby('id', 'desc')->paginate(10);

        }
        

        return view('venda.list', ['vendas' => $vendas]);

    }



    public function destroy($id){

        $venda = Venda::findOrFail($id);

        foreach($venda->cotas as $c){

            $c->delete();

        }

        $venda->delete();

        $sorteio = Sorteio::findOrFail($venda->sorteio->id);

        $sorteio->qtnVenda = $sorteio->qtnVenda - count($venda->cotas);

        $sorteio->update();



        return redirect('/vendas/all')->with('msg', 'venda deletada com sucesso');

    }





}

