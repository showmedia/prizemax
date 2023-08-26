@extends('layouts.user')

@section('title', 'PrizeMax Indicados')



@section('content')

<div class="header">

<span>

<ion-icon class="icon" name="flash"></ion-icon> 

<strong>Indicados</strong> 

<small></small>

</span>

</div>

<div class="body">

    <div class="col-xl-12">
        <div class="head2 text-center">
            <div class="iten">
                Indicados <br>
                {{count(Auth::user()->indicados)}}
            </div>
            <div class="iten">
                Sorteios Ativos <br>
                @php 
                $contador = count(collect($sorteios)->filter(function ($sorteio) {
                    return $sorteio->status == 0;
                }));
                @endphp
                {{$contador}}
            </div>
            <div class="iten">
                Ganho Total <br>
                R$ {{number_format(Auth::user()->conta->ganhototal,2,',','.')}}
            </div>
            <div class="iten">
                Ganho Pago <br>
                R$ {{number_format(Auth::user()->conta->ganhopago,2,',','.')}}
            </div>
            <div class="iten bg-success">
                Saldo em Conta <br>
                R$ {{number_format(Auth::user()->conta->saldo,2,',','.')}}
            </div>
        </div>
    </div>

    <div class="text-center col-12">
    <button {{Auth::user()->conta->saldo > 0.99 ? '' : 'disabled'}} class="btn btn-success btn-sm m-2" data-bs-toggle="modal" data-bs-target="#sacar"><ion-icon name="cash-outline"></ion-icon> Solicitar Saque</button>
    </div>

    

    <div class="text-center col-12">
       @foreach(Auth::user()->saques as $saque)
                @if($saque->status == 0)
                <div class="alert alert-success" role="alert">
                    {{date('d/m/Y h:i', strtotime($saque->created_at))}} - R$ {{number_format($saque->valor,2,',','.')}}
                </div>
                @endif
       @endforeach
    </div>

    <div class="p-2">
        <br>
        @foreach(Auth::user()->indicados as $indicado)
        <div class="col-xl-12">
       
            <div class="head3 col-xl-12">
            {{$indicado->name}} - {{$indicado->phone}}
        
            </div>
        <div class="head2 text-center indicado">
            <div class="iten">
                Compras <br>
                {{ count($indicado->compras->filter(function($item) {
    return $item->status == 1; 
})) }}
            </div>
          
            <div class="iten">
                Valor Compras <br>
                R$ {{ number_format($indicado->compras->filter(function($item) {
    return $item->status == 1;
})->sum('valueAll'), 2, ',', '.') }}
            </div>
            <div class="iten">
                Percentual comissão <br>
                {{Auth::user()->comissao * 100}}%
            </div>
            <div class="iten">
                Comissão <br>
                R$ {{number_format($indicado->compras->filter(function($item) {
    return $item->status == 1;
})->sum('valueAll') * Auth::user()->comissao,2,',','.')}}
            </div>
        </div>
    </div>
    @endforeach
       
    </div>


<!-- Modal -->
<div class="modal fade" id="sacar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar Saque</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/saque" method="post">
        @csrf
      <div class="modal-body">
        
      <div class="mb-3">
      <label for="tipo" class="form-label">Tipo de Chave</label>

      <select class="form-select" id="tipo" name="tipo" aria-label="Default select example">
        <option selected>Telefone</option>
        <option value="1">Email</option>
        <option value="2">CPF</option>
        </select>
      </div>
        
        <div class="mb-3">
            <label for="chave" class="form-label">Chave Pix</label>
            <input type="text" name="chave" class="form-control" id="chave" required='required'>
        </div>
        <label for="valorpix" class="form-label">Valor Saque</label>
        <div class="input-group mb-3">
           <input type="hidden" id="saldoconta" value="{{Auth::user()->conta->saldo}}">
            <span class="input-group-text" id="basic-addon1">R$</span>
            <input type="text" value="{{floor(Auth::user()->conta->saldo)}}" class="form-control" data-mask-reverse="true" id="valorpix" name="valorpix" aria-describedby="basic-addon1">
            <span class="input-group-text" id="basic-addon1">,00</span>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="this.form.submit(); this.disabled=true; this.innerHTML='Solicitando...'" class="btn btn-primary">Solicitar</button>
      </div>
      </form>
    </div>
  </div>
</div>

  
</div>
@endsection