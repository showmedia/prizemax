@extends('layouts.user')

@section('title', 'PrizeMax Vendedores')

@section('content')

<div class="header">

<span>

<ion-icon class="icon" name="flash"></ion-icon> 

<strong>Vendedores</strong> 

<small></small>

</span>

</div>

<div class="body">

    <div class="col-xl-12">
        <div class="head2 text-center">
            <div class="iten">
                Vendedores <br>
                {{count($vendedores)}}
            </div>
            <div class="iten">
                Comissão Total <br>
                R$ {{number_format($vendedores->pluck('conta.ganhototal')->sum(),2,',','.')}}
            </div>
            <div class="iten">
                Comissão Paga <br>
                R$ {{number_format($vendedores->pluck('conta.ganhopago')->sum(),2,',','.')}}
            </div>
            <div class="iten">
                Saldo a pagar <br>
                R$ {{number_format($vendedores->pluck('conta.saldo')->sum(),2,',','.')}}
            </div>
            <div class="iten">
                Saques solicitados <br>
                R$ {{number_format($saques->sum('valor'),2,',','.')}}
            </div>
        </div>
    </div>
<br>
    <div class="text-center col-12" style="cursor:pointer;">
       @foreach($saques->reverse() as $saque)
                <div class="alert alert-success" data-bs-toggle="modal" data-bs-target="#saque{{$saque->id}}" role="alert">
                    {{date('d/m/Y h:i', strtotime($saque->created_at))}} - <strong>{{$saque->user->name}}</strong> - Valor Solicitado R$ {{number_format($saque->valor,2,',','.')}}
                </div>

                <!-- Modal -->
<div class="modal fade" id="saque{{$saque->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Saque Solicitado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/saque/{{$saque->id}}" method="post">
        @csrf
        @method('put')
      <div class="modal-body">

      <div class="p-2 text-center">
            <p>
                <strong>{{$saque->user->name}}</strong><br>
                Data: {{ date('d/m/y h:i', strtotime($saque->created_at)) }} <br>
                Valor: {{ number_format($saque->valor,2,',','.') }} <br>
                Tipo Chave: {{ $saque->tipochave ?? '' }} <br>
                Chave Pix: {{ $saque->chave ?? '' }}
            </p>
      </div>
 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Depois</button>
        <button type="button" onclick="this.form.submit(); this.disabled=true; this.innerHTML='Pagando...'" class="btn btn-success">Pagar</button>
      </div>
      </form>
    </div>
  </div>
</div>
       @endforeach
    </div>


    <div class="p-2">
        <br>
        @foreach($vendedores as $indicado)
        <div class="col-xl-12">
       
            <div class="head3 col-xl-12">
            {{$indicado->name}} - {{$indicado->phone}}
        
            </div>
        <div class="head2 text-center indicado">
            <div class="iten">
                Indicados <br>
                {{ count($indicado->indicados) }}
            </div>
          
            <div class="iten">
                Ganho Total <br>
                R$ {{ number_format($indicado->conta->ganhototal, 2, ',', '.') }}
            </div>
            <div class="iten">
                Ganho Pago <br>
                R$ {{ number_format($indicado->conta->ganhopago, 2, ',', '.') }}
            </div>
            <div class="iten">
                Saldo a Pagar <br>
                R$ {{ number_format($indicado->conta->saldo,2,',','.') }}
            </div>
            <div class="iten">
                Saque solicitado <br>
                R$ {{number_format($indicado->saques->filter(function($item) {
    return $item->status == 0;
})->sum('valor'),2,',','.')}}
            </div>
        </div>
    </div>
    @endforeach
       
    </div>



  
</div>
@endsection