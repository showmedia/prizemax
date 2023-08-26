<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Nota;

use App\Models\Numero;



class NotaController extends Controller

{

    

    public function create(){

        return view('nota.create');

    }



    public function show($id){

        $nota = Nota::findOrFail($id);

        return view('nota.show', ['nota' => $nota]);

    }



    public function store(Request $request){

         $nota = new Nota;

         $nota->name = $request->name;

         $nota->email = $request->email;

         $nota->phone = $request->phone;

         $nota->save();

         return redirect('nota/'.$nota->id)->with('msg', 'Agora adicione os números');

    }



    public function list(){

        $search = request('search');



        if($search) {

            $notas = Nota::where([

                ['name', 'like', '%'.$search.'%']

            ])->get();

        } else {

            $notas = Nota::orderby('id', 'desc')->get();

        }



        

        return view('nota.list', ['notas' => $notas]);

    }



    public function add(Request $request){

        $nota = Nota::findOrFail($request->id);

        $numero = new Numero;

        $numero->numero = $request->cota;

        $japossui = Numero::where([
            ['numero', $request->cota]
        ])->get();

        if(count($japossui) > 0){
            return redirect('/nota/'.$nota->id)->with('msg', 'Essa cota já foi adicionada no talão');
        }

        $numero->notas_id = $nota->id;

        $numero->save();

        return redirect('/nota/'.$nota->id)->with('msg', 'Cota adicionada com sucesso');

    }



    public function delete($id){

        $nota = Nota::findOrFail($id);

        foreach($nota->numeros as $cota){

            $cota->delete();

        }

        $nota->delete();

        return redirect('notas')->with('msg', 'vendas deletadas com sucesso!');

    }



    public function remove($id){

        $cota = Numero::findOrFail($id);

        $idNota = $cota->nota->id;

        $cota->delete();

        return redirect('nota/'.$idNota)->with('msg', 'Cota deletada com suesso!');

    }

    public function limpar(){
        $notas = Nota::all();
        foreach($notas as $nota){
            foreach($nota->numeros as $num){
                $num->delete();
            }
            $nota->delete();
        }
        return redirect('/notas')->with('msg', 'Todas notas foram deletadas!');
    }



}

