<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="cart-outline"></ion-icon> 
                            <strong>Compra cotas </strong> 
                            <small> check-out</small>
                            </span>
                        </div>

                        <div class="alert alert-info" role="alert">
                            Você esta adquirindo <?php echo e(count($venda->cotas)); ?> cota(s) para o sorteio <b>"<?php echo e($venda->sorteio->name); ?>"</b>. 
                            Confira suas cotas abaixo e preencha seus dados.
                        </div>

                        <div class="cotas">
                            
                            <?php $__currentLoopData = $venda->cotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ct"><?php echo e(sprintf("%04s",$cota->number)); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </div>
<br>
                        <div class="form-create">
    
    <form action="/venda/confirmar/<?php echo e($venda->id); ?>" method="GET">
        <div class="controle">

        <div class="alert alert-warning" role="alert">
                Informe seu e-mail para continuar!
            </div>
      

            <label for="email" class="group-input">
                <input type="email" required="required"
                <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->email); ?>"<?php endif; ?>
                name="email" id="email">
                <span>Informe seu E-mail</span>
            </label>
            <label for="phone" class="group-input">
                <input type="text" required="required"
                <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->phone); ?>"<?php endif; ?>
                name="phone" id="phone">
                <span>Informe seu Whatsapp</span>
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
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/storage/9/cf/31/galdinoefilhopre1/public_html/sorteio/resources/views/venda/comprar.blade.php ENDPATH**/ ?>