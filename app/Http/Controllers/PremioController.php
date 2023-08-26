<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Premio;
use App\Models\Sorteio;

class PremioController extends Controller
{
    
    public function create($id){
        $sorteio = Sorteio::findOrFail($id);
        return view('premio.create', ['sorteio' => $sorteio]);
    }

    public function store(Request $request){
        $premio = new Premio;
        $premio->name = $request->name;
        $premio->description = $request->description;
        $premio->sorteios_id = $request->id;
        // Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $request->image->move(public_path('img/cursos'), $imageName);

            $premio->image = $imageName;
        }

        $premio->save();

        return redirect('sorteio/show/'.$request->id)->with('msg', 'Prêmio adicionado com sucesso!');
    }

    public function edit($id){
        $premio = Premio::findOrFail($id);
        return view('premio.edit', ['premio' => $premio]);
    }

    public function update(Request $request){
        $premio = Premio::findOrFail($request->id);
        $premio->name = $request->name;
        $premio->description = $request->description;

        // Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $request->image->move(public_path('img/cursos'), $imageName);

            $premio->image = $imageName;
        }

        $premio->update();

        return redirect('/sorteio/show/'.$premio->sorteio->id)->with('msg', 'Prêmio editado com sucesso!');
    }
}
