@extends('layouts.main')

@section('title', 'dashboard - Galdino & Filho Premiações')

@section('content')
  
<div class="form-create">
        <h4>Cadastrar prêmio ao sorteio "{{$sorteio->name}}" </h4>

        <form action="/produto/{{$sorteio->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="controle">
            <div class="area-upload">
                <label for="upload-file" class="label-upload">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <div class="texto">Imagem do produto do prêmio <br>Clique ou arraste o arquivo</div>
                </label>
                <input type="file" name="image" id='image' class="image" accept="image/jpg,image/png"  multiple/>
                
                <div class="lista-uploads">
                </div>
               
            </div>

            <div class="img-curso">
                <img src="" alt="" class="img-capa-curso" id="img-user">
            </div>
                
                <label for="name" class="group-input">
                    <input type="text" required="required" name="name" id="name">
                    <span>Nome do produto</span>
                </label>
    

                <label for="description" class="group-input description">
                    <textarea name="description" id="description" rows="3" maxlength="500"></textarea>
                    <span>Descrição do produto</span>
                    <p>Limite de 500 caracteres. Resta:<strong id="limite">500</strong></p>
                </label>
            
                <div class="container-btn">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
            
        </form>
    </div>


@endsection