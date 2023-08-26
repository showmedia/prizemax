<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/img/logo2.png" type="image/x-icon" />



        <title>@yield('title')</title>



        <!-- FONTS DO GOOGLE-->

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">





        <!-- CSS BOOTSTRAP -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- CSS DA APLICAÇÃO-->

        

        <link rel="stylesheet" href="/css/style-user.css?v=3">

        @yield('css')

    </head>



    <body style="padding-bottom: 450px;">

            <header>

                <nav class="nav-bar">

                    <div class="nav-itens">

                        <a href="/">

                        <img src="/img/logo2.png" alt="PrizeMax">

                        </a>

                        <span id="nav-menu">

                            <ion-icon id="abrir" name="menu"></ion-icon>

                            <ion-icon id="fechar" name="close"></ion-icon>

                        </span>

                    </div>

                </nav>



                <div class="find-menu"></div>

            </header>



    <main>

         <div class="tela-user">

                        @if(session('msg'))

                            <div class="alert alert-success" role="alert">

                                {{session('msg')}}

                            </div>

                        @endif



                    @yield('content')

                    

         </div>   
         
                    <div class="p-2">
                    @if(Auth::user() && Auth::user()->isvendedor)
                        <div id="div-alert" style="width:100%; text-align:center; display:none; max-width: 400px; max-height: 50px; margin: 10px auto;" class="alert alert-success" role="alert">
                                        <p id="text-alert"></p>
                        </div>  
                            <div style="max-width: 600px; width:100%; margin:auto;">
                        <h6 id="clicklink" onclick="cliquelink();" style="cursor:pointer;text-align:center; color: white; font-size: 12px;">Link de indicação: <strong id="linkind">https://prizemax.com.br/register?indicado={{Auth::user()->id}}&pass={{Auth::user()->password}}</strong></h6>
                            </div>
                    @endif
                    </div>


    </main>

        <footer>

            <div class="row">

                <div class="col-xl-4">

                    

                    <div class="row">

                        <div class="col-2"><h1>1</h1></div>

                        <div class="col-10">

                        <p>

                            <strong>

                            <ion-icon class="icon" name="search"></ion-icon>

                            Escolha o sorteio

                            </strong><br>

                            Escolha o prêmio que gostaria de concorrer, verifique a descrição, regulamento do sorteio e fotos em caso de dúvidas entre em contato.

                        </p>

                        </div>

                    </div>

                </div>

                <div class="col-xl-4">

                <div class="row">

                        <div class="col-2"><h1>2</h1></div>

                        <div class="col-10">

                            <br>

                        <p>

                            <strong>

                            <ion-icon class="icon" name="grid"></ion-icon>

                            Selecione quantas cotas deseja!

                            </strong><br>

                                Quanto mais cotas, maior a chance de ganhar.

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-xl-4">

                <div class="row">

                        <div class="col-2"><h1>3</h1></div>

                        <div class="col-10">

                            <br>

                        <p>

                            <strong>

                            <ion-icon class="icon" name="card"></ion-icon>

                            Faça o Pagamento!

                            </strong><br>

                                Faça o pagamento via pix copia e cola seu número

                                aprova na hora.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </footer>



        <!-- Botao grupo whats -->



        <a href="https://chat.whatsapp.com/HRPcFSt6XfAHdSMN2u5A2v" target="_blanck" class="btn btn-success btn-whats"> <ion-icon name="logo-whatsapp"></ion-icon>

 Grupo </a>





        <div class="corpo-menu">

            <div class="lista-menu">

                <ul>

                    @auth

                        <li><ion-icon name="user"></ion-icon> {{Auth::user()->name}} </li>

                    @endauth

                    <a href="/"><li><ion-icon class="icon" name="home"></ion-icon> Início</li></a>

                    @auth 
                        @if(Auth::user()->isvendedor == 1)
                            <a href="/indicados"> <li><ion-icon class="icon" name="analytics-outline"></ion-icon> Indicados</li></a>
                        @endif

                        @if(Auth::user()->nivel == 1)

                        <a href="/vendedores"> <li><ion-icon class="icon" name="analytics-outline"></ion-icon> Vendedores</li></a>

                        <a href="/dashboard"> <li><ion-icon class="icon" name="analytics-outline"></ion-icon> Dashboard</li></a>

                        <a href="/notas"> <li><ion-icon class="icon" name="analytics-outline"></ion-icon> Talão</li></a>
                        <a href="/sorteio"> <li><ion-icon class="icon" name="add-outline"></ion-icon> Novo Sorteio</li></a>

                        @endif

                      
                    @endauth
                    @if(!Auth::user() || Auth::user()->nivel == 0)
                    <a href="/meusnumeros"><li><ion-icon class="icon" name="list"></ion-icon> Meus números</li></a>
                    @endif
                    @auth 



                    @else

                    <a href="/register"><li><ion-icon class="icon" name="create"></ion-icon> Cadastro</li></a>

                    @endauth

                    
                    @if(!Auth::user() || Auth::user()->nivel == 0)

                    <a href="/ganhadores"><li><ion-icon class="icon" name="create"></ion-icon> Ganhadores</li></a>

                    <a href="/termos"><li><ion-icon class="icon" name="list"></ion-icon> Termos de uso</li></a>

                    <a href="/parceiros"><li><ion-icon class="icon" name="people"></ion-icon> Parceiros</li></a>
                    @endif

                    @auth

                    <form action="/logout" method="POST">

                                                @csrf 

                                                <a href="/logout" onclick="event.preventDefault();

                                    this.closest('form').submit();"><li><ion-icon class="icon" name="exit"></ion-icon> Sair</li></a>

                

                                            </form>

                    @else 

                    <a href="/login"><li><ion-icon class="icon" name="enter"></ion-icon> Entrar</li></a>

                    

                    @endauth

                    

                  </ul>

            </div>

        </div>

    



    <!-- script bootstrap-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/js/jquery.mask.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <script>

                                   var clipboard = new ClipboardJS('.btn-copiar');

                                    clipboard.on('success', function(e) {

                                      alert('Pix copia e cola, copiado para área de transferência');

                                    });

                                </script>

 <!-- SCRIPT DA APLICAÇÃO-->

 <script src="/js/script.js"></script>

   



    <script>

        $(document).ready(function(){

        $("#valorpix").mask('99999');
        $("#valorpix").on('input', function() {
            var valorMaximo = parseFloat($("#saldoconta").val()); // Convertendo para número

            var valorDigitado = parseFloat($(this).val()); // Convertendo o valor digitado para número

            if (valorDigitado > valorMaximo) {
                $(this).val(Math.floor(valorMaximo));
            }
        });


         var slide = 0;

        $("#fechar").hide();

    $("#nav-menu").click(function(){

        if(slide == 0){

            $(".corpo-menu").fadeIn(400);

            $("#abrir").hide();

            $("#fechar").show();

            slide = 1;

        }else{

            $(".corpo-menu").fadeOut(400);

            $("#abrir").show();

            $("#fechar").hide();

            slide = 0;

        }

    }); 

            

    setTime2();

    var contar = 0;

    function setTime2(){

        if(contar == 0){

            $(".info-pisca").fadeOut();

            contar = 1;

        }else{

            $(".info-pisca").fadeIn();

            contar = 0;

        }

        setTimeout(setTime2, 1000);

    }

    });

    </script>

     

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>

</html>

