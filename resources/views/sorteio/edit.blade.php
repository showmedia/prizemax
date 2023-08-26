@extends('layouts.main')



@section('title', 'dashboard - Galdino & Filho Premiações')



@section('content')



<div class="form-create" >

        <h4>Editar Sorteio</h4>



        <form action="/sorteio/edit/{{$sorteio->id}}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('put')

            <div class="controle">

            <div class="area-upload">

                <label for="upload-file" class="label-upload">

                    <i class="fas fa-cloud-upload-alt"></i>

                    <div class="texto">Imagem de capa do sorteio (500x500) <br>Clique ou arraste o arquivo caso queira alterar a imagem</div>

                </label>

                <input type="file" name="image" id='image' class="image" accept="image/jpg,image/png"  multiple/>

                

                <div class="lista-uploads">

                </div>

               

            </div>



            <div class="img-curso">

                <img src="/img/cursos/{{$sorteio->image}}" alt="" class="img-capa-curso" id="img-user">

            </div>

                

                <label for="name" class="group-input">

                    <input type="text" required="required" value="{{$sorteio->name}}" name="name" id="name">

                    <span>Nome do sorteio</span>

                </label>

<br><br>

                <label for="qtnCotas" class="group-input">

                    <input type="text" required="required" value="{{$sorteio->qtnCotas}}" name="qtnCotas" id="qtnCotas">

                    <span>Quantidade de cotas a serem vendidas</span>

                </label>

<br><br>

                <label for="valorCota" class="group-input">

                    <input type="text" required="required" value="{{$sorteio->valorCota}}" name="valorCota" id="valorCota">

                    <span>Valor por cota</span>

                </label>



                <label for="description" class="group-input description">

                    <textarea name="description" id="description" rows="3" maxlength="500"> {{$sorteio->regulamento}} </textarea>

                    <span>Regulamento</span>

                    <p>Limite de 500 caracteres. Resta:<strong id="limite">500</strong></p>

                </label>

            

                <div class="container-btn">

                    <button class="btn btn-primary">Salvar</button>

                </div>

            </div>

            

        </form>

    </div>



@endsection