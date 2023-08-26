@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')

    <div class="item-show">

        <img src="/img/cursos/{{$sorteio->image}}" alt="">

        <div class="info-item">

            <h3> {{$sorteio->name}} </h3>

            <small> Extração da Loteria Federal </small>

            @if($sorteio->qtnCotas <= $sorteio->qtnVenda)
            <div class="info-pisca bg-danger">

                Venda encerrada!

            </div>
            @else
            <div class="info-pisca">

                Compre agora!

            </div>
            @endif

        </div>

    </div>



    <div class="info-valor">

        POR APENAS <span id="vlr"> {{  'R$ '.number_format($sorteio->valorCota, 2, ',', '.') }} </span>

    </div>



    <div class="info-regulamento">

        <p id="text-regulamento-disable">{{$sorteio->regulamento}}



        

        </p>



        

        <div id="text-regulamento"></div>

        

    </div>



    <div class="links-social">

        <a href="https://wa.me/5511916853771"><ion-icon class="whatsapp btn2" name="logo-whatsapp"></ion-icon></a>

        <a href="https://www.instagram.com/galdinoefilho_premios/"><ion-icon class="instagram btn2" name="logo-instagram"></ion-icon></a>

        <a href="https://www.facebook.com/gefpremiacoes"><ion-icon class="facebook btn2" name="logo-facebook"></ion-icon></a>

        <a href=""><ion-icon class="telegram btn2" name="send"></ion-icon></a>

    </div>



    <div class="header">

        <span>

                            <ion-icon class="icon" name="flash"></ion-icon> 

                            <strong>Cotas</strong> 

                            <small>Escolha sua sorte</small>

                            </span>

    </div>

<!-- 

    <div class="show-cotas">

        <div class="cotas btn-cotas">

            <div class="p">Cotas

            </div>

            <div class="span"> {{$sorteio->qtnCotas}}  </div>

        </div>

        <div class="livres btn-cotas">

            <div class="center">

            <div class="p">Livres

            </div>

            <div class="span"> {{$sorteio->qtnCotas - $sorteio->qtnVenda}}  </div>

           

            </div>

        </div>

        <div class="pagos btn-cotas">



        <div class="p">Pagos

            </div>

            <div class="span"> {{$sorteio->qtnVenda}} </div>

        </div>

        

    </div> -->



    <div class="meus-numeros" onclick="link('/meusnumeros')">

    <a href="/meusnumeros"><ion-icon name="rocket"></ion-icon> Ver meus números</a>

    </div>

    @if($sorteio->status == 0)

    <?php

            $pct = ($sorteio->qtnVenda / $sorteio->qtnCotas) * 100;

        ?>

    <div class="progress">

            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-label="Success example" style="width: {{ ceil($pct)}}%" aria-valuenow="{{ ceil($pct)}}" aria-valuemin="0" aria-valuemax="100">{{ ceil($pct)}}%</div>

        </div>



        <div class="rodape" style="z-index: 9999;">

            <div class="grupo-whats"></div>

            <div class="compra-automatica">

                <p><strong>Compra automática</strong> <br>

                <small>O site escolhe números aleatórios para você</small></p>



                <div class="selecoes">

                    <div class="ops">

                        <div class="op" onclick="somar(2,{{$sorteio->valorCota}})">

                            <p>

                                <small>+</small>

                                <strong>02</strong> <br>

                                <span>SELECIONAR</span>

                            </p>

                        </div>

                        <div class="op" onclick="somar(5,{{$sorteio->valorCota}})">

                            <p>

                                <small>+</small>

                                <strong>05</strong> <br>

                                <span>SELECIONAR</span>

                            </p>

                        </div>

                    </div>

                    <div class="ops">

                    <div class="op op-selected" onclick="somar(10,{{$sorteio->valorCota}})">

                            <p>

                                <small>+</small>

                                <strong>10</strong> <br>

                                <span>SELECIONAR</span>

                            </p>

                            <span class="popular info-pisca"> Mais popular </span>

                        </div>

                        <div class="op" onclick="somar(25,{{$sorteio->valorCota}})">

                            <p>

                                <small>+</small>

                                <strong>25</strong> <br>

                                <span>SELECIONAR</span>

                            </p>

                        </div>

                    </div>

                    <div class="ops">

                    <div class="op" onclick="somar(50,{{$sorteio->valorCota}})">

                            <p>

                                <small>+</small>

                                <strong>50</strong> <br>

                                <span>SELECIONAR</span>

                            </p>

                        </div>

                        <div class="op" onclick="somar(100,{{$sorteio->valorCota}})">

                            <p>

                                <small>+</small>

                                <strong>100</strong> <br>

                                <span>SELECIONAR</span>

                            </p>

                        </div>

                    </div>

                </div>



              <!--   <div class="desconto bg-danger info-pisca" id="info-pisca">Promoção: Pague apenas R$ 13,50 na compra de 10 cotas <span id="desconto"> - *Desconto aplicado</span></div>

 -->

                <form action="/sorteio/comprar/{{$sorteio->id}}" method="post">

                <div class="input-compra">

               

                    @csrf

                <div class="input-group mb-3">

                    <span class="input-group-text" id="menos" onclick="calcular({{$sorteio->valorCota}},0)"><ion-icon class="menos" name="remove-circle-outline"></ion-icon></span>

                    <input type="text" class="form-control" name="qtn" id="numberCotas" value="10" aria-label="Amount (to the nearest dollar)">

                    <span class="input-group-text" id="mais" onclick="calcular({{$sorteio->valorCota}},1)"><ion-icon class="mais" name="add-circle-outline"></ion-icon></span>

                </div>

                <div class="input-botao">
                    @if($sorteio->qtnCotas <= $sorteio->qtnVenda)
                        <button type="button" disabled class="bg-danger disabled">Encerrado <span id="comprar"></span></button>
                    @else 
                        <button class="bg-success">Comprar <span id="comprar"></span></button>
                    @endif
                </div>

              

                </div>

                </form>

               

            </div>



            @else

            <h4>Sorteio Finalizado</h4>

            @endif

        <!--     <span class="span-max info-pisca"> Compra máxima até o momento: <b>{{$max}}</b> cotas </span>

        

              -->   

        </div>

@endsection