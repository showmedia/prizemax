@extends('layouts.user')



@section('title', 'PrizeMax')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="cart-outline"></ion-icon> 

                            <strong>Compra cotas </strong> 

                            <small> check-out</small>

                            </span>

                        </div>



                        <div class="alert alert-info" role="alert">

                            Você esta adquirindo {{count($venda->cotas)}} cota(s) para o sorteio <b>"{{$venda->sorteio->name}}"</b>. 

                            Confira suas cotas abaixo e preencha seus dados.

                        </div>



                        <div class="cotas">

                            

                            @foreach($venda->cotas as $cota)

                                <div class="ct">{{sprintf("%03s",$cota->number)}}</div>

                            @endforeach

                       

                        </div>

<br>

                        <div class="form-create">

    

    <form action="/venda/confirmar/{{$venda->id}}" method="GET">

        <div class="controle">



        <div class="alert alert-warning" role="alert">

                Informe seu e-mail para continuar!

            </div>

      



            <label for="email" class="group-input">

                <input type="email" required="required"

                @auth value="{{Auth::user()->email}}"@endauth

                name="email" id="email">

                <span>Informe seu E-mail</span>

            </label>

            <label for="phone" class="group-input">

                <input type="text" required="required"

                @auth value="{{Auth::user()->phone}}"@endauth

                name="phone" id="phone">

                <span>Informe seu Whatsapp</span>

            </label>

            <div class="container-btn">

                <button class="btn btn-primary btn-form">   

                Continuar

                <ion-icon class="icon" name="send"></ion-icon> 

                </button>

            </div>

        </div>

        

    </form>

</div>



@endsection