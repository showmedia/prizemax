

<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="cart-outline"></ion-icon> 
                            <strong>Venda Cota pelo talão </strong> 
                            <small> Criar vendar</small>
                            </span>
                        </div>

                        <div class="alert alert-info" role="alert">
                            Você esta vendendo cota(s) para o sorteio com base no talão, com números separados para este fim,
                            lembre-se, esteja atento para não adicionar aqui, e no talão, número que foi separado.
                        </div>

                 
<br><br>
                        <div class="form-create">
    
    <form action="/nota" method="POST">
        <?php echo csrf_field(); ?>
        <div class="controle">

        <div class="alert alert-warning" role="alert">
                Informe os dados para continuar!
            </div>
      

            <label for="name" class="group-input">
                <input type="text" required="required"
                name="name" id="name">
                <span>Nome</span>
            </label>
            <label for="email" class="group-input">
                <input type="email" 
                name="email" id="email">
                <span>E-mail</span>
            </label>
            <label for="phone" class="group-input">
                <input type="text"
                name="phone" id="phone">
                <span>Whatsapp</span>
            </label>
            <div class="container-btn">
                <button class="btn btn-primary btn-form">   
                Continuar
                <ion-icon class="icon" name="send"></ion-icon> 
                </button>
            </div>
        </div>
        
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/impac075/galdinoefilhopremiacoes.com.br/sorteio/resources/views/nota/create.blade.php ENDPATH**/ ?>