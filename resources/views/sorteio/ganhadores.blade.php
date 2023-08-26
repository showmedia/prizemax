@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')





<div class="header">

                            <span>

                            <ion-icon class="icon" name="compass"></ion-icon> 

                            <strong> Sorteios </strong> 

                            <small> Ganhadores</small>

                            </span>

                        </div>

                        @if(count($sorteios) == 0)

<div class="alert alert-info" role="alert">

    Ainda não tivemos a conclusão da venda das cotas do primeiro sorteio

</div>

@else
@php 
    $cont = 0;
@endphp
    @foreach($sorteios as $sorteio)
                                @php 
                                $cont++;
                            @endphp

            <div class="vencedor">

            {{$sorteio->name}} <br>

           <span> {{$sorteio->sorteado}}</span>


            </div>

    @endforeach

@endif



@endsection