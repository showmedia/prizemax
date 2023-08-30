



@extends('layouts.user')



@section('title', 'PrizeMax')



@section('content')



<div class="pagamento">

<div class="head-pagamento">



    <div class="icone">

    <ion-icon class="icon" name="checkmark-circle-outline"></ion-icon>

    </div>



    <div class="text-header">

        <strong> @if($venda->status == 0) Aguardando Pagamento @else Pago @endif </strong> <br>

        <small> @if($venda->status == 0) Finalize o pagamento @else Parabéns, você já esta concorrendo @endif </small>

    </div>



</div>

<div class="body-pagamento">

   @if($venda->status == 0)

   <div class="alert alert-warning" role="alert">

    Pix copia e cola: abra o aplicativo do seu banco pelo celular, selecione PIX e faça o pagamento. Ou escaneie o código com um celular.

    </div>



    <div class="qr-code">

        <!-- qrcode -->

        <img class="img-qrcode" src="data:image/png;base64,{{$pag->point_of_interaction->transaction_data->qr_code_base64 ?? ''}}"> 



        

    </div>

    



   

    <div class="copia-cola">

        <div class="input" style="width: 100%;">

            <textarea id="qr_code_text" style="height:150px; width:100%; word-wrap: break-word; white-space: pre-wrap;">{{$pag->point_of_interaction->transaction_data->qr_code ?? ''}}</textarea>

        </div>

         <button id="btn-copia" class="btn-copiar" data-clipboard-target="#qr_code_text"><ion-icon name="documents-outline"></ion-icon></button>
 
    </div>

   @endif

</div>

</div>

 

                                <div class="body">

                                <div class="item-sorteio">

                                        <img src="/img/cursos/{{$venda->sorteio->image}}" alt="{{$venda->sorteio->name}}">

                                        <div class="info-item">

                                            <strong> {{$venda->sorteio->name}} </strong><br>

                                            <small> {{mb_strimwidth($venda->sorteio->regulamento, 0, 50, "...")}} </small>

                                            <div class="info-pisca">

                                                Concorra agora!

                                            </div>

                                        </div>

                                    </div>



                                    <div class="detalhes_compra">

                                        <h6> <ion-icon name="information-circle-outline"></ion-icon>

 Detalhes da sua compra  </h6>



                                        <div class="infos">

                                            <p><b>Comprador: </b> {{$venda->user->name}} </p>

                                            <hr>



                                            <p><b>Telefone: </b> {{$venda->user->phone}} </p>

                                            <hr>



                                            <p><b>Data/horário: </b> {{ date('d/m/Y', strtotime($venda->created_at))}} às {{date('H:i', strtotime($venda->created_at))}} </p>

                                            <hr>



                                            <p><b>Situação: </b> @if($venda->status == 0) Aguardando Pagamento @else Pago @endif </p>

                                            <hr>



                                            <p><b>Total: </b> {{  'R$ '.number_format($venda->valueAll, 2, ',', '.') }}  </p> <br>

                                          

                                            <hr>



                                            <p><b>Cotas: </b> @foreach($venda->cotas as $cota) {{sprintf("%04s",$cota->number)}},   @endforeach </p>

                                           
                                        </div>

                                    </div>

                                </div>



                                



@endsection