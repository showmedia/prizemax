@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="cart-outline"></ion-icon> 

                            <strong> {{$nota->name}} </strong> 

                            <small> Números</small> 

                            

                            </span><br>

                            <h6> {{$nota->email}} - {{$nota->phone}} </h6>

                        </div>



                        <div class="alert alert-info" role="alert">

                            Adicione as cotas separadas para este cliente

                        </div>



                        <div class="cotas">

                            

                            @foreach($nota->numeros as $cota)

                                <div class="ct"  data-bs-toggle="modal" data-bs-target="#modal{{$cota->id}}">{{sprintf("%03s",$cota->numero)}}</div>

                                <!-- Modal -->

<div class="modal fade" id="modal{{$cota->id}}" tabindex="-1" aria-labelledby="modal{{$cota->id}}" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar cota</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

      Deletar a cota <b>{{$cota->numero}}</b>?

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <form action="/nota/numero/{{$cota->id}}" method="post">

            @csrf 

            @method('DELETE')

            <button type="submit" class="btn btn-danger">Deletar</button>

        </form>

        

      </div>

    </div>

  </div>

</div>

                            @endforeach

                       

                        </div>

<br>

                        <div class="form-create">

    

    <form action="/nota/numero/{{$nota->id}}" method="post">

        @csrf

        <div class="controle">



        <div class="alert alert-warning" role="alert">

                Adicione uma cota por vez!

            </div>

      



            <label for="cota" class="group-input">

                <input type="text" required="required"

                    name="cota" id="cota">

                <span>Informe a cota</span>

            </label>

         

            <div class="container-btn">

                <button class="btn btn-primary btn-form">   

                Adicionar

                <ion-icon class="icon" name="send"></ion-icon> 

                </button>

            <script>
              window.addEventListener('DOMContentLoaded', function() {
                    var inputElement = document.getElementById('cota');
                    inputElement.focus();
                  });
            </script>

            </div>

        </div>

        

    </form>

    <a href="/nota" class="btn btn-success" style="position:absolute; right: 50px; bottom: 30px;">Cadastrar Novo</a>

</div>



@endsection