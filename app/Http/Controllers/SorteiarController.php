<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Sorteio;

use App\Models\Venda;

use App\Models\Nota;

use App\Models\User;



class SorteiarController extends Controller

{

    public function pesquisar(Request $request){

        $sorteio = Sorteio::findOrFail(1);

        $vencedor = null;

        $primeiro = null;

        $segundo = null;

        $terceiro = null; 
        $notavenc = null;
        $uservenc = null;

        $venda = new Venda;

        foreach($sorteio->vendas as $venda){

            foreach($venda->cotas as $cota){

                if($cota->number == intval($request->cota)){

                    $venda = $cota->venda;

                    if($venda->user->id == 1){
                    
                        foreach($notas as $nota){

                            foreach($nota->numeros as $numero){

                                if($numero->numero == intval($request->cota)){

                                    $vencedor = $nota->name;
                                    $notavenc = $nota;

                                }

                            }

                        }

                    }else{

                        $vencedor = $venda->user->name;
                        $uservenc = $venda->user;
                    }

                }

            }

        }



         $users = User::all();

        $pri = 0;

        $seg = 0;

        $terc = 0;

        foreach($users as $user){



            if($user->id != 1){

                $cont = 0;

                foreach($user->compras as $compra){

                    $cont = $cont + count($compra->cotas);

                }

                if($cont > $pri){

                    $pri = $cont;

                    $primeiro = $compra->user->name;

                }

            }



        }

        foreach($users as $user){

            if($user->id != 1 && $user->name != $primeiro){

                $cont = 0;

                foreach($user->compras as $compra){

                    $cont = $cont + count($compra->cotas);

                }

                if($cont > $seg){

                    $seg = $cont;

                    $segundo = $compra->user->name;

                }

            }

        }

        foreach($users as $user){

            if($user->id != 1 && $user->name != $primeiro && $user->name != $segundo){

                $cont = 0;

                foreach($user->compras as $compra){

                    $cont = $cont + count($compra->cotas);

                }

                if($cont > $terc){

                    $terc = $cont;

                    $terceiro = $compra->user->name;

                }

            }

        }
 


        if($vencedor == ''){

            $vencedor = 'Ninguém comprou a cota '.$request->cota;

        }



        return view('sorteio.sortear', ['notavenc' => $notavenc, 'uservenc' => $uservenc,  'vencedor' => $vencedor,'cota'=>$request->cota, 'pri' => $pri, 'seg' => $seg, 'terc' => $terc, 'primeiro' => $primeiro, 'segundo' => $segundo, 'terceiro' => $terceiro, 'sorteio' => $sorteio]);



    }



    public function show($id){

        $sorteio = Sorteio::findOrFail($id);

        return view('sorteio.sortear', ['vencedor' => '', 'cota' => '', 'pri' => '', 'seg' => '', 'terc' => '', 'primeiro' => '', 'segundo' => '', 'terceiro' => '', 'sorteio' => $sorteio]);

    }



    public function save(Request $request){

        $sorteio = Sorteio::findOrFail($request->id);

        $sorteio->sorteado = $request->vencedor;

        $sorteio->status = 1;

        $sorteio->save();

        return redirect('/')->with('msg', 'Sorteio finalizado com sucesso, o vencedor foi indicado');

    }

}