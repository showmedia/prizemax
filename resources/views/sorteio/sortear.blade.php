@extends('layouts.user')



@section('title', 'dashboard - Galdino & Filho Premiações')



@section('content')



<div class="text-center">

{{$sorteio->name}} 

</div> <br>



<form action="/sorteio/pesquisar" method="get">





    <div class="input-group mb-3">

        <button class="btn btn-outline-primary" type="submit" id="button-addon1">Pesquisar</button>

        <input type="search" name="cota" id="cota" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1">

    </div>



</form>






<b>Vencedor:</b>   {{$vencedor}} - {{$notavenc->phone ?? ''}} {{$uservenc->phone ?? ''}} 


<br><br>    

<!-- <div class="text-center">

<b>MAIS COTAS</b> 

</div>

<div>

    <table class="table table-hover">

        <tbody>

            <tr>

                <td><b>Primeiro:</b></td>

                <td>{{$primeiro}} - {{$pri}} cotas </td>

            </tr>

            <tr>

                <td><b>Segundo:</b></td>

                <td>{{$segundo}} - {{$seg}} cotas</td>

            </tr>

            <tr>

                <td><b>Terceiro:</b></td>

                <td> {{$terceiro}} - {{$terc}} cotas</td>

            </tr>

        </tbody>

    </table>

</div> -->



<div class="text-end">

<form action="/sorteio/vencedor/save" method="post">

    @csrf 

    @method('PUT')

    <input type="hidden" name="vencedor" required value="{{$vencedor}}">

    <input type="hidden" name="id" required value="{{$sorteio->id}}">

    <button class="btn btn-primary btn-sm">Salvar</button>

</form>

</div>

@endsection