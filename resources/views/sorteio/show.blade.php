@extends('layouts.main')

@section('title', 'dashboard - Galdino & Filho Premiações')

@section('content')

<div class="fluid-container show-sorteio">
    <h4> {{$sorteio->name}} - 
    <a href="/produto/{{$sorteio->id}}" class="btn btn-primary btn-sm">Adicionar Prêmio</a>
    <a href="/sorteio/edit/{{$sorteio->id}}" class="btn btn-info btn-sm">Editar Sorteio</a>
    </h4>
   
    @if($sorteio->image)
        <img src="/img/cursos/{{$sorteio->image}}" alt="" class="img img-sorteio">
    @endif
    <div>
        <br>
        @if($sorteio->is_favorite)
            <a href="/sorteio/favorito/{{$sorteio->id}}" class="btn btn-danger btn-sm">Desfovoritar</a> 
        @else
            <a href="/sorteio/favorito/{{$sorteio->id}}" class="btn btn-primary btn-sm">Favoritar</a>
        @endif
    </div>

    <div class="sorteio-premios">
        <h5>Prêmios do Sorteio</h5>
        <?php $cont = 0; ?>
        <div class="premio-list">
        @foreach($sorteio->premios as $premio)
            <?php $cont++; ?>
            
                <div class="premio">
                    <img src="/img/cursos/{{$premio->image}}" alt="" class="img-premio img">
                    <div class="premio-name">
                    <a href="/premio/edit/{{$premio->id}}">
                    <span> {{$premio->name}} </span>
                    </a>
                    <p> <strong>Descrição: </strong> {{$premio->description}} </p>
                    </div>
                </div>
            
        @endforeach
        </div>
        @if($cont == 0)
        <br>
            <div class="alert alert-warning" role="alert">
                você ainda não tem premio cadastrado neste sorteio
            </div>
        @endif
    </div>

    @if($sorteio->qtnVenda == $sorteio->qtnCotas)
        <div class="parabens">
            <strong>Parabéns, você vendeu todas cotas</strong> <br>
            <a href="/sorteio/finalizar" class="btn btn-success btn-sm">Adicionar número sorteado</a>
        </div>
    @endif

    <div class="sorteio-infos">
        <h5>Informações do Sorteio</h5>

        <a href="/vendas/paginate" class="btn btn-sm btn-primary">Ver vendas</a>
        <a href="/sorteio/vencedor/{{$sorteio->id}}" class="btn btn-success btn-sm">Adicionar vencedor</a>

        <div class="infos">
            <div class="info-qtnCota info-item">
                <div class="header">
                    Cotas
                </div>
                <div class="body">
                    {{$sorteio->qtnCotas}} 
                </div>
                
            </div>
            <div class="info-valor info-item">
                <div class="header">
                    Valor Cota
                </div>
                <div class="body">
                     {{  'R$ '.number_format($sorteio->valorCota, 2, ',', '.') }} 
                </div>    
                
            </div>
            <div class="info-venda info-item"> 
                <div class="header">
                    Vendido
                </div>
                <div class="body">
                    {{$sorteio->qtnVenda}} 
                </div>
               
            </div>
            <div class="info-vlrVendido info-item"> 
                <div class="header">
                    Valor Vendido
                </div>
                <div class="body">
                    {{'R$ '.number_format($sorteio->valorCota * $sorteio->qtnVenda, 2, ',','.')}} 
                </div>
                
            </div>
        </div>

        <?php
            $pct = ($sorteio->qtnVenda / $sorteio->qtnCotas) * 100;
        ?>

        <div class="progress">
            <div class="progress-bar bg-success progress-bar-striped"  role="progressbar" aria-label="Success example" style="width: {{ ceil($pct)}}%" aria-valuenow="{{ ceil($pct)}}" aria-valuemin="0" aria-valuemax="100">{{ ceil($pct)}}%</div>
        </div>
        
        <div class="regulamento">
            <p> <strong>Regulamento: </strong> {{$sorteio->regulamento}} </p>
        </div>
    </div>
</div>




@endsection