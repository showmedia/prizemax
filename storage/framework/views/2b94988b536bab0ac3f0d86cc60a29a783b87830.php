<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>


<div class="header">
                            <span>
                            <ion-icon class="icon" name="compass"></ion-icon> 
                            <strong> Sorteios </strong> 
                            <small> Ganhadores</small>
                            </span>
                        </div>
                        <?php if(count($sorteios) == 0): ?>
<div class="alert alert-info" role="alert">
    Ainda não tivemos a conclusão da venda das cotas do primeiro sorteio
</div>
<?php else: ?>
    <?php $__currentLoopData = $sorteios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorteio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="vencedor">
            <?php echo e($sorteio->name); ?> <br>
           <span> <?php echo e($sorteio->sorteado); ?></span>
           <img src="/img/sorteio1.jpeg" alt="imagem do ganhador do primeiro sorteio">
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/storage/9/cf/31/galdinoefilhopre1/public_html/sorteio/resources/views/sorteio/ganhadores.blade.php ENDPATH**/ ?>