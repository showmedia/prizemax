@extends('layouts.user')

@section('title', 'Galdino & Filho Premiações')

@section('content')

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="flash"></ion-icon> 
                            <strong>Contato </strong> 
                            <small> Tire suas dúvidas</small>
                            </span>
                        </div>

                        <div class="form-create">
    
        <form action="/contato" method="POST">
            @csrf
            <div class="controle">

                <label for="name" class="group-input">
                    <input type="text" required="required" 
                    @auth value="{{Auth::user()->name}}"  @endauth
                    name="name" id="name">
                    <span>Nome</span>
                </label>

                <label for="phone" class="group-input">
                    <input type="text" required="required" name="phone" id="phone"
                    @auth value="{{Auth::user()->phone}}" @endauth
                    >
                    <span>Telefone</span>
                </label>

                <label for="email" class="group-input">
                    <input type="email" required="required"
                    @auth value="{{Auth::user()->email}}"@endauth
                    name="email" id="email">
                    <span>E-mail</span>
                </label>

                <label for="sorteio" class="group-input group-select">
                    <select required="required"
                    name="sorteio" id="sorteio">
                    <option value="nenhum">Deseja falar sobre um sorteio?</option>

                    @foreach($sorteios as $sorteio) 
                        <option value="{{$sorteio->name}}"> {{$sorteio->name}} </option>
                    @endforeach
                </select>
                    <span>Sorteio</span>
                </label>
    

                <label for="description" class="group-input description">
                    <textarea name="mensagem" id="description" rows="3" maxlength="500"></textarea>
                    <span>Mensagem</span>
                    <p>Limite de 500 caracteres. Resta:<strong id="limite">500</strong></p>
                </label>
            
                <div class="container-btn">
                    <button class="btn btn-primary btn-form">   
                    Enviar
                    <ion-icon class="icon" name="send"></ion-icon> 
                    </button>
                </div>
            </div>
            
        </form>
    </div>

@endsection