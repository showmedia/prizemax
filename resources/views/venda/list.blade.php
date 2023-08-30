@extends('layouts.main')



@section('title', 'dashboard - PrizeMax')



@section('content')



<div class="listar-vendas">



@foreach($vendas as $v)

    <div class="venda"> 

        <b>Data: </b> {{ date('d/m/Y - H:i', strtotime($v->created_at))}} <br>

        <b>Nome: </b> {{$v->user->name}} <br>

        <b>email: </b> {{$v->user->email}} <br>

        <b>Telefone: </b> {{$v->user->phone}} <br>

        <b>Sorteio: </b> {{$v->sorteio->name}} <br>

        <b>Quantidade de cotas: </b>  {{$v->quantidade}} <br>

        <b>Cotas: </b> @foreach($v->cotas as $cota) @if($v->sorteio->qtncotas < 1001) {{sprintf("%03s",$cota->number)}} @else {{sprintf("%04s",$cota->number)}}  @endif, @endforeach <br>

        <b>Status: </b> @if($v->status == 0) Pendente @else Pago @endif <br>





        @if($v->status == 0)

            <div class="botoes">

                <div class="bt">

                    <form action="/venda/status/{{$v->id}}" method="post">

                    @csrf

                    <button class="btn btn-sm btn-success">Pagou em dinheiro</button>

                    </form>

                 </div>



                <div class="bt">

                    <form action="/venda/delete/{{$v->id}}" method="post">

                      @csrf 

                    @method('DELETE')

                    <button class="btn btn-sm btn-danger">Apagar</button>

                    </form>

                </div>

            </div>

        @endif



       

    </div>



@endforeach

<a href="/vendas/all" class="btn btn-sm btn-warning">Ver todas</a>

</div>



@endsection