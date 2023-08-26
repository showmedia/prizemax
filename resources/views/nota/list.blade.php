@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="cart-outline"></ion-icon> 

                            <strong> Cotas vendidas pelo talão </strong> 

                            <small> todas vendas</small>

                            </span>

                        </div>

                        <form action="/notas" method="get">

                        <div class="input-group mb-3">

                           

                           <input type="text" class="form-control" placeholder="Pesquise pelo nome" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">

                           <button class="btn btn-outline-success" type="submit" id="button-addon2">Pesquisar</button>

                           </div> 

                                </form>

                        



                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>Nome</th>

            

                                    <th>Qtn cotas</th>

                                    <th> <a href="/nota" class="btn btn-primary btn-sm"> <ion-icon name="add-outline"></ion-icon> </a> </th>

                                </tr>

                            </thead>

                            <tbody>

                                    

                                        @foreach($notas as $nota)

                                        <tr>

                                            <td>{{$nota->name}}</td>

                                            

                                

                                            <td> {{count($nota->numeros)}} </td>

                                            <td> <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$nota->id}}"><ion-icon name="trash-outline"></ion-icon></a>                                      

                                             <a href="/nota/{{$nota->id}}" class="btn btn-sm btn-success"> <ion-icon name="add-circle-outline"></ion-icon> </a> </td>

                                        </tr>



                                            

                        <!-- Modal -->

<div class="modal fade" id="deleteModal{{$nota->id}}" tabindex="-1" aria-labelledby="deleteModal{{$nota->id}}" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar cotas desse cliente</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        {{$nota->name}} <br>

        @foreach($nota->numeros as $num)

            {{sprintf("%03s",$num->numero)}} - 

        @endforeach

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <form action="/nota/{{$nota->id}}" method="post">

            @csrf 

            @method('DELETE')

            <button type="submit" class="btn btn-danger">Deletar</button>

        </form>

        

      </div>

    </div>

  </div>

</div>



                                        @endforeach

                                    

                            </tbody>

                        </table>

<br><br>
<form action="/notes/deletar" method="post">
  @csrf
  @method('delete')
           <button class="btn btn-sm btn-danger">Limpar Talão</button>
           </form>
@endsection