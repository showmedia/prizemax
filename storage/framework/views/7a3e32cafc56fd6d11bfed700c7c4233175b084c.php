<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- FONTS DO GOOGLE-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">


        <!-- CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- CSS DA APLICAÇÃO-->
        <link rel="stylesheet" href="/css/style.css">


        
    </head>

    <body>
            <header>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbar">
                        <a href="/dashboard" class="navbar-brand">
                            <img src="/img/logo.png" class="img-navbar">
                            <div class="name-logo">
                                <span>Galdino & Filho <small>Premiações<small></span>
                            </div>
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/vendas/paginate" class="nav-link">Vendas</a>
                            </li>
                            <li class="nav-item">
                                <a href="/sorteio" class="nav-link">Novo Sorteio</a>
                            </li>
                            <?php if(auth()->guard()->check()): ?>
                                <li class="nav-item item-user">
                                    <a href="/dashboard" class="nav-link"></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item" href="/user/editar/<?php echo e(Auth::user()->id); ?>">Editar Perfil</a>
                                            </li>
                                            <li>
                                            <form action="/logout" method="POST">
                                                <?php echo csrf_field(); ?> 
                                                <a href="/logout"
                                                    class="dropdown-item"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    Sair
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                    
                            <?php endif; ?>
                           
                        </ul>
                    </div>
                </nav>
            </header>

    <main>
         <div class="tela">
                        <?php if(session('msg')): ?>
                            <p class="msg-align <?php if(session('class')): ?>alert alert-<?php echo e(session('class')); ?><?php else: ?> msg <?php endif; ?>"><?php echo e(session('msg')); ?></p>
                        <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
         </div>         
        
    </main>

           
    <footer>
        <p>Galdino e Filho Premiações - &copy;2022</p>
    </footer>


    <!-- script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/jquery.mask.js"></script>
      <!-- SCRIPT DA APLICAÇÃO-->
      <script src="/js/script.js"></script>
    <!-- icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
<?php /**PATH /home/storage/9/cf/31/galdinoefilhopre1/public_html/sorteio/resources/views/layouts/main.blade.php ENDPATH**/ ?>