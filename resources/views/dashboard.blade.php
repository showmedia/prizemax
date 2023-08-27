@extends('layouts.user')



@section('title', 'dashboard - PrizeMax')



@section('css')

<link rel="stylesheet" href="/css/style.css">

@endsection



@section('content')



<div class="row">



    @if($sorteios)



    @foreach($sorteios as $sorteio)

    <div class="col-xl-12">

        <div class="sorteio-item">

        <a href="/sorteio/show/{{$sorteio->id}}">

            <img src="/img/cursos/{{$sorteio->image}}" alt="">

</a>

            <div class="infos infor">

            <div class="info-qtnCota info-item">

                <div class="header">

                    Cotas <br>

                    {{$sorteio->qtnCotas}} 

                </div>

            </div>



            <div class="info-valor info-item">

                <div class="header">

                    Valor Cota <br>

                    {{  'R$ '.number_format($sorteio->valorCota, 2, ',', '.') }}

                </div>

            </div>



            <div class="info-venda info-item"> 

                <div class="header">

                    Vendido <br>

                    {{$sorteio->qtnVenda}} 

                </div>               

            </div>

            <div class="info-vlrVendido info-item"> 

                <div class="header">

                    Valor Vendido <br>

                    {{'R$ '.number_format($sorteio->valorCota * $sorteio->qtnVenda, 2, ',','.')}} 

                </div>

            

                

            </div>

        </div>



        <?php

            $pct = ($sorteio->qtnVenda / $sorteio->qtnCotas) * 100;

        ?>



        <div class="progresso">

            <div class="value-progresso" style="width: {{$pct}}%"></div>

        </div>

            <div class="body">

                <a href="/sorteio/show/{{$sorteio->id}}">{{$sorteio->name}}</a>

            </div>

        </div>

    

    </div>

    

        

    @endforeach



    @else

    <div class="alert alert-primary" role="alert">

        Você ainda não tem nenhum sorteio cadastrado!

    </div>

    @endif



</div>



@endsection

