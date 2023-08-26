Parabéns, você acabou de efetuar uma compra de {{count($venda->cotas)}} para o sorteio 
{{$venda->sorteio->name}}. <br><br>

Seus números: @foreach($venda->cotas as $cota) {{sprintf("%04s",$cota->number)}}, @endforeach<br><br>

Efetue o pagamento para garantir sua participação no sorteio. <br><br>

Se atente ao regulamento: <br>

{{$venda->sorteio->regulamento}}

