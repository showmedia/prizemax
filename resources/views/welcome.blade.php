@extends('layouts.user')



@section('title', 'PrizeMax')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="flash"></ion-icon> 

                            <strong>Prêmios</strong> 

                            <small>Escolha sua sorte</small>

                            </span>

                        </div>



                        <div class="body">

                            @foreach($sorteios as $sorteio)

                                @if($sorteio->status == 0 && $sorteio->is_favorite == 1)

                                <div class="item-show" onclick="link('/user/sorteio/show/{{$sorteio->id}}')">

                                    <img src="/img/cursos/{{$sorteio->image}}" alt="">

                                    <div class="info-item">

                                        <h3> {{$sorteio->name}} </h3>

                                        <small> Extração da Loteria Federal </small>

                    @if($sorteio->qtnCotas <= $sorteio->qtnVenda)
                    <div class="info-pisca bg-danger">

Compre agora!

</div>
                    @else
                                        <div class="info-pisca">

                                            Compre agora!

                                        </div>
                @endif
                                    </div>

                                </div>

                                @endif

                            @endforeach

                            @foreach($sorteios as $sorteio)

                                @if($sorteio->status == 0 && $sorteio->is_favorite == 0)

                                    <div class="item-sorteio" onclick="link('/user/sorteio/show/{{$sorteio->id}}')">

                                        <img src="/img/cursos/{{$sorteio->image}}" alt="{{$sorteio->name}}">

                                        <div class="info-item">

                                            <strong> {{$sorteio->name}} </strong><br>

                                            <small> {{mb_strimwidth($sorteio->regulamento, 0, 50, "...")}} </small>

                                            <div class="info-pisca">

                                                Concorra agora!

                                            </div>

                                        </div>

                                    </div>

                                @endif

                            @endforeach



                            <div class="duvida" id="duvida" onclick="link('/contato')">

                                <p>Dúvidas<br>

                                    <small>Fale conosco</small>

                                </p> 

                            </div>



                            <div class="header">

                                <span>

                                <ion-icon class="icon" name="golf"></ion-icon>

    

                                <strong>Ganhadores</strong> 

                                <small>Premiados</small>

                                </span>

                            </div>

                            <!-- Adicionar lista de ganhadores dos ultimos sorteios -->
                            @php 
    $cont = 0;
@endphp
         
                            @foreach($sorteios as $sorteio)
                            @php 
                                $cont++;
                            @endphp
                       @if($sorteio->status == 1)

                                <div class="vencedor">

            {{$sorteio->name}} <br>

           <span> {{$sorteio->sorteado}}</span>

            </div>

                                @endif

                            @endforeach

                        



                        </div>



@endsection







